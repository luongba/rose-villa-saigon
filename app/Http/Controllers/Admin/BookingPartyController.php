<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use App\Models\BookingParty;
//use TCG\Voyager\Http\Controllers\VoyagerBaseController as BaseVoyagerBaseController;
use App\Events\AfterConfirmBookingParty;

class BookingPartyController extends VoyagerBaseController
{
     /*accept order gift*/
    public function accept(Request $request){
        $arr_id = explode(',', $request->list_id);
        foreach($arr_id as $id){
            $update_stt = BookingParty::findOrFail($id);
            if($update_stt){
                $update_stt -> status = 1;
                $update_stt -> save();
                /*sent email*/
                event(new AfterConfirmBookingParty($update_stt));

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
            $update_stt = BookingParty::findOrFail($id);
            if($update_stt){
                $update_stt -> status = 2;
                $update_stt -> save();
                /*sent email*/
                event(new AfterConfirmBookingParty($update_stt));
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