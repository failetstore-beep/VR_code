<?php
use App\Http\Controllers\Api\{ProductApi,EventApi,UploadApi};

Route::get('/v1/products/{slug}', [ProductApi::class,'show']);
Route::post('/v1/events', [EventApi::class,'store'])->middleware('throttle:60,1');
Route::post('/v1/upload', [UploadApi::class,'store'])->middleware('auth:sanctum');
