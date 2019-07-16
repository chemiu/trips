<?php

namespace App\Http\Controllers;

use App\Trip;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function cancelTrip(Request $request) {
        $success=false;

        $trip = Trip::where(
            [
                'user_id' =>$request->get('user_id'),
                'active' => true,
                'id'=>$request->get('trip_id')
            ])
            ->first();
        if(!$trip){
            //TODO make this a real 403 use auth middleware
            abort(403, 'Access denied');
        }else{
            $trip->active=false;
            if($trip->save()){
                $success=true;
            }
        }
        return response()->json(array('success'=> $success), 200);
    }
}
