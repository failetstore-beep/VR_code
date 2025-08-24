<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Embed extends Model
{
    protected $fillable = ['product_id','token','default_mode','lang_default','allowed_domains','expires_at'];

    protected $casts = [
        'allowed_domains' => 'array',
        'expires_at' => 'datetime',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
