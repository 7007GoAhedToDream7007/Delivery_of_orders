<?php

namespace App\Http\Controllers;

trait apiResponse
{
    public function apiResponse($data = null, $message = null, $status = null)
    {
        $array = [
            'data' => $data,
            'message' => $message,
            'status' => $status
        ];
        return response()->json($array, $status);
    }
}
