<?php

namespace App\Http\Helpers;

use Illuminate\Http\JsonResponse;

class ResponseHelper
{

    public static function renderResponse(int $statusCode,string $message,$data=[])
    {
        return new JsonResponse([
            'status' => $statusCode,
            'message' => $message,
            "data" => $data
        ],$statusCode);
    }

}
