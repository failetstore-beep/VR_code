<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'merchant_id','sku','name','slug','category',
        'width_mm','height_mm','depth_mm','default_mode','is_active'
    ];

    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class);
    }
}
