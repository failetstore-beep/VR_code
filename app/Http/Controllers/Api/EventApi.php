<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventApi extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|integer',
            'embed_id' => 'nullable|integer',
            'type' => 'required|string',
            'data' => 'array',
        ]);
        $data['ip'] = $request->ip();
        $data['ua'] = $request->userAgent();
        $data['created_at'] = now();
        $event = Event::create($data);
        return ['status' => 'ok', 'id' => $event->id];
    }
}
