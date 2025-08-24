<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;

class UploadApi extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
            'type' => 'required|string',
            'product_id' => 'required|integer',
        ]);
        $path = $request->file('file')->store('uploads');
        $asset = Asset::create([
            'product_id' => $request->product_id,
            'type' => $request->type,
            'path' => $path,
        ]);
        return ['id' => $asset->id, 'path' => $path];
    }
}
