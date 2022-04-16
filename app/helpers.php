<?php

function response_success($data = [], $message = 'success', $status = 200)
{
    return response()->json([
        'message' => $message,
        'data' => $data,
    ], $status);
}

function response_error($errors = [], $message = 'error', $status = 400)
{
    return response()->json([
        'message' => $message,
        'errors' => $errors,
    ], $status);
}
