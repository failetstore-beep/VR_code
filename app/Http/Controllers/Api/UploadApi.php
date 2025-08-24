<?php
namespace App\Http\Controllers\Api;

class UploadApi
{
    public function store()
    {
        return json_encode(['uploaded'=>true]);
    }
}
