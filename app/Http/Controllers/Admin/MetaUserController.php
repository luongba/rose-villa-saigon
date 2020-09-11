<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use App\Models\UserMeta;
use App\User;
use App\Events\AfterConfirmMembership;
use Auth;

//use TCG\Voyager\Http\Controllers\VoyagerBaseController as BaseVoyagerBaseController;

class MetaUserController extends VoyagerBaseController
{
    public function index(Request $request)
    {
        $type_user = $request -> type_user ? $request -> type_user : '1';
        // GET THE SLUG, ex. 'posts', 'pages', etc.
        $slug = $this->getSlug($request);

        // GET THE DataType based on the slug
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('browse', app($dataType->model_name));

        $getter = $dataType->server_side ? 'paginate' : 'get';

        $search = (object) ['value' => $request->get('s'), 'key' => $request->get('key'), 'filter' => $request->get('filter')];

        $searchNames = [];
        if ($dataType->server_side) {
            $searchable = SchemaManager::describeTable(app($dataType->model_name)->getTable())->pluck('name')->toArray();
            $dataRow = Voyager::model('DataRow')->whereDataTypeId($dataType->id)->get();
            foreach ($searchable as $key => $value) {
                $field = $dataRow->where('field', $value)->first();
                $displayName = ucwords(str_replace('_', ' ', $value));
                if ($field !== null) {
                    $displayName = $field->getTranslatedAttribute('display_name');
                }
                $searchNames[$value] = $displayName;
            }
        }

        $orderBy = $request->get('order_by', $dataType->order_column);
        $sortOrder = $request->get('sort_order', $dataType->order_direction);
        $usesSoftDeletes = false;
        $showSoftDeleted = false;

        // Next Get or Paginate the actual content from the MODEL that corresponds to the slug DataType
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);

            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $query = $model->{$dataType->scope}();
            } else {
                $query = $model::select('*');
            }

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model)) && Auth::user()->can('delete', app($dataType->model_name))) {
                $usesSoftDeletes = true;

                if ($request->get('showSoftDeleted')) {
                    $showSoftDeleted = true;
                    $query = $query->withTrashed();
                }
            }

            // If a column has a relationship associated with it, we do not want to show that field
            $this->removeRelationshipField($dataType, 'browse');

            if ($search->value != '' && $search->key && $search->filter) {
                $search_filter = ($search->filter == 'equals') ? '=' : 'LIKE';
                $search_value = ($search->filter == 'equals') ? $search->value : '%'.$search->value.'%';
                $query->where($search->key, $search_filter, $search_value);
            }

            if ($orderBy && in_array($orderBy, $dataType->fields())) {
                $querySortOrder = (!empty($sortOrder)) ? $sortOrder : 'desc';
                $dataTypeContent = call_user_func([
                    $query->where('type_user','=',$type_user)->orderBy($orderBy, $querySortOrder),
                    $getter,
                ]);
            } elseif ($model->timestamps) {
                $dataTypeContent = call_user_func([$query->where('type_user','=',$type_user)->latest($model::CREATED_AT), $getter]);
            } else {
                $dataTypeContent = call_user_func([$query->where('type_user','=',$type_user)->orderBy($model->getKeyName(), 'DESC'), $getter]);
            }

            // Replace relationships' keys for labels and create READ links if a slug is provided.
            $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType);
        } else {
            // If Model doesn't exist, get data from table name
            $dataTypeContent = call_user_func([DB::table($dataType->name)->where('type_user','=',$type_user), $getter]);
            $model = false;
        }

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($model);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'browse', $isModelTranslatable);

        // Check if server side pagination is enabled
        $isServerSide = isset($dataType->server_side) && $dataType->server_side;

        // Check if a default search key is set
        $defaultSearchKey = $dataType->default_search_key ?? null;

        // Actions
        $actions = [];
        if (!empty($dataTypeContent->first())) {
            foreach (Voyager::actions() as $action) {
                $action = new $action($dataType, $dataTypeContent->first());

                if ($action->shouldActionDisplayOnDataType()) {
                    $actions[] = $action;
                }
            }
        }

        // Define showCheckboxColumn
        $showCheckboxColumn = false;
        if (Auth::user()->can('delete', app($dataType->model_name))) {
            $showCheckboxColumn = true;
        } else {
            foreach ($actions as $action) {
                if (method_exists($action, 'massAction')) {
                    $showCheckboxColumn = true;
                }
            }
        }

        // Define orderColumn
        $orderColumn = [];
        if ($orderBy) {
            $index = $dataType->browseRows->where('field', $orderBy)->keys()->first() + ($showCheckboxColumn ? 1 : 0);
            $orderColumn = [[$index, $sortOrder ?? 'desc']];
        }

        $view = 'voyager::bread.browse';

        if (view()->exists("voyager::$slug.browse")) {
            $view = "voyager::$slug.browse";
        }


        return Voyager::view($view, compact(
            'actions',
            'dataType',
            'dataTypeContent',
            'isModelTranslatable',
            'search',
            'orderBy',
            'orderColumn',
            'sortOrder',
            'searchNames',
            'isServerSide',
            'defaultSearchKey',
            'usesSoftDeletes',
            'showSoftDeleted',
            'showCheckboxColumn'
        ));
    }
    /*end index*/
     public function show(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $dataTypeContent = call_user_func([$model, 'findOrFail'], $id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        // Replace relationships' keys for labels and create READ links if a slug is provided.
        $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType, true);

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'read');

        // Check permission
        $this->authorize('read', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.read';

        if (view()->exists("voyager::$slug.read")) {
            $view = "voyager::$slug.read";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'));
    }

    public function accept(Request $request){
        $arr_id = explode(',', $request->list_id);
        $password = $request -> password;
        foreach($arr_id as $id){
            $update_stt = UserMeta::findOrFail($id);
            if($update_stt){
                /*check phone*/
                $check_phone = User::where('phone','=',$update_stt -> phone)->count();
                if($check_phone > 0){
                    
                    $redirect = redirect()->back();
                    return $redirect->with([
                        'message'    => __('Accept Error!Account already exists'),
                        'alert-type' => 'error',
                    ]);
                }else{
                    /*new user */
                    $new_user = new User;
                    $new_user -> role_id = 2;
                    $new_user -> first_name = $update_stt -> first_name;
                    $new_user -> last_name = $update_stt -> last_name;
                    $new_user -> email = $update_stt -> email;
                    $new_user -> password = bcrypt($password);

                    $new_user -> type_user = $update_stt -> type_user;
                    $new_user -> avatar = $update_stt -> avatar;
                    $new_user -> phone = $update_stt -> phone;
                    $new_user -> phone_verified_at = now();
                    $new_user -> gender =  $update_stt -> gender;
                    $new_user -> dob =  $update_stt -> dob;
                    $new_user -> occupation =  $update_stt -> occupation;
                    $new_user -> address_one =  $update_stt -> address_one;
                    $new_user -> address_two =  $update_stt -> address_two;
                    $new_user -> city =  $update_stt -> city;
                    $new_user -> post_code =  $update_stt -> post_code;
                    $new_user -> country =  $update_stt -> country;
                    $new_user -> reason =  $update_stt -> reason;
                    $new_user -> usage_criteria =  $update_stt -> usage_criteria;
                    $new_user -> bring_to =  $update_stt -> bring_to;
                    $new_user -> member_other =  $update_stt -> member_other;
                    $new_user -> membership_type_id  =  $update_stt -> membership_type_id;
                    $new_user -> frequency = $update_stt -> frequency;
                    $new_user -> save();
                    /*membership type*/
                    $new_user ->membershipType()->sync($update_stt -> membership_type_id);
                    /*end new user*/
                    $update_stt -> status = 1;
                    $update_stt -> save();
                    $user = $update_stt->user;

                    /*sent email*/
                    $data['password'] = $password;
                    event(new AfterConfirmMembership($update_stt, $data));
                }
                

            }else{
                $redirect = redirect()->back();
                return $redirect->with([
                    'message'    => __('Accept Error!Account already exists'),
                    'alert-type' => 'error',
                ]);
            }
        }
        $redirect = redirect()->back();
        return $redirect->with([
            'message'    => __('voyager::generic.successfully_created'),
            'alert-type' => 'success',
        ]);
    }
    /*accept order gift*/
    public function cancel(Request $request){
        $arr_id = explode(',', $request->list_id);
        foreach($arr_id as $id){
            $update_stt = UserMeta::findOrFail($id);
            if($update_stt){
                $update_stt -> status = 2;
                $update_stt -> save();
               $user = $update_stt->user;
                /*sent email*/
               event(new AfterConfirmMembership($update_stt));
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Cancel Error!',
                ], 200);
            }
        }
        return response()->json([
            'success' => true,
            'message' => 'Cancel Success',
        ], 200);

    }

}