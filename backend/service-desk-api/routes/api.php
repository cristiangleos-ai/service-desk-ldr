<?php

use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'Service Desk API is running',
        'service' => 'service-desk-ldr',
        'version' => '1.0.0',
    ]);
});