<?php

namespace App\Helper;

class ResponseHelper
{

    public static function ok($data)
    {
        $response = [
            'status' => 'OK',
            'data' => $data
        ];
        return response($response, 200);
    }

    public static function paging($data, $page, $total_page)
    {
        $response = [
            'status' => 'OK',
            'data' => $data,
            'paging' => [
                'page' => $page,
                'total_page' => $total_page
            ]
        ];
        return response($response, 200);
    }

    public static function badRequest($errors, string $message)
    {
        $response = [
            'status' => 'BAD_REQUEST',
            'message' => $message,
            'errors' => $errors
        ];
        return response($response, 400);
    }

    public static function unauthorized($message)
    {
        $response = [
            'status' => 'UNAUTHORIZED',
            'message' => $message
        ];

        return response($response, 401);
    }

    public static function forbidden($message)
    {
        $response = [
            'status' => 'FORBIDDEN',
            'message' => $message
        ];

        return response($response, 403);
    }

    public static function methodNotAllowed($message)
    {
        $response = [
            'status' => 'METHOD_NOT_ALLOWED',
            'message' => $message
        ];

        return response($response, 405);
    }

    public static function notFound($message)
    {
        $response = [
            'status' => 'NOT_FOUND',
            'message' => $message
        ];

        return response($response, 404);
    }

    public static function serviceUnavailable($message)
    {
        $response = [
            'status' => 'SERVICE_UNAVAILABLE',
            'message' => $message
        ];

        return response($response, 503);
    }
}