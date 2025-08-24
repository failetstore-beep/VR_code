<?php
namespace App\Http\Controllers\Api;

class ProductApi
{
    public function show($slug)
    {
        return json_encode(['slug'=>$slug]);
    }
}
