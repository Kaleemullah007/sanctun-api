<?php

namespace App\Common;

class Responses
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public static function success($message=null,$data=[],$errorcode=200){

        return response()->json(['status'=>'success','message'=>$message,'data'=>$data],$errorcode);
    }

    public static function error($message=null,$errorcode=400){

        return response()->json(
            [
                'status'=>'error',
                'message'=>$message,
                
            ]
            ,$errorcode);
    }

}
