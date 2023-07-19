<?php

namespace App\Traits;



use Illuminate\Http\Response;

trait ApiResponse
{
    public function successResponse($data, $message = null, $code = Response::HTTP_OK)
    {
        return response()->json(['status' => 'success', 'message' => $message, 'data' => $data], $code);
    }

    public function errorResponse($data, $message = null, $code = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        return response()->json(['status' => 'failed', 'message' => $message, 'data' => $data], $code
        );
    }
}