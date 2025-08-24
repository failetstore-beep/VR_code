<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductApi extends Controller
{
    public function show($slug)
    {
        $product = Product::with('assets')->where('slug', $slug)->firstOrFail();
        $assets = $product->assets;
        $overlay = $assets->firstWhere('type', 'overlay');
        $modelBase = $assets->firstWhere('type', 'model_base');
        $reference = $assets->where('type', 'reference')->map(function ($a) {
            return [
                'name' => $a->meta['name'] ?? '',
                'url' => $a->path,
                'width_mm' => $a->width_mm,
                'height_mm' => $a->height_mm,
            ];
        })->values();
        $model3d = $assets->firstWhere('type', 'model3d');
        return [
            'id' => $product->id,
            'slug' => $product->slug,
            'name' => $product->name,
            'default_mode' => $product->default_mode,
            'overlay' => $overlay ? [
                'url' => $overlay->path,
                'width_mm' => $overlay->width_mm,
                'height_mm' => $overlay->height_mm,
            ] : null,
            'model_base' => $modelBase ? [
                'url' => $modelBase->path,
                'wrist_mm' => $modelBase->meta['wrist_mm'] ?? null,
            ] : null,
            'reference' => $reference,
            'model3d' => $model3d ? [
                'url' => $model3d->path,
            ] : null,
        ];
    }
}
