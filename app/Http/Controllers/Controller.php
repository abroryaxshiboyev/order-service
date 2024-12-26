<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function success($data, $message = null,$statusCode=200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ],$statusCode);
    }

    public function error($message,$error, $statusCode = 400)
    {
        return response()->json([
            'message' => $message,
            'error'=>$error
        ], $statusCode);
    }
}
