<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use App\Models\UserMeta;
use App\User;
use App\Events\AfterConfirmMembership;

//use TCG\Voyager\Http\Controllers\VoyagerBaseController as BaseVoyagerBaseController;

class MetaUserController extends VoyagerBaseController
{
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
        foreach($arr_id as $id){
            $update_stt = UserMeta::findOrFail($id);
            if($update_stt){
                $update_stt -> status = 1;
                $update_stt -> save();
                $user = $update_stt->user;
                /*sent email*/
               event(new AfterConfirmMembership($user));

            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Accept Error!',
                ], 200);
            }
        }
        return response()->json([
            'success' => true,
            'message' => 'Accept Success',
        ], 200);
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
               event(new AfterConfirmMembership($user));
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