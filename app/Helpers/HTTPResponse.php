<?php
namespace App\Helpers;
 trait HTTPResponse
 {
    public function successRequest($data, $msg,$code = 200)
    {
        return [
            'data'=>$data,
            'success'=>true,
            'status'=> [
                'message' => $msg,
                'code' => $code
            ]
        ];
    }
    public function wrongRequest ($msg,$code, $data = null)
    {
        return [
            'data'=>$data,
            'success'=>false,
            'status'=> [
                'message' => $msg,
                'code' => $code
            ]
        ];
    }
 }
