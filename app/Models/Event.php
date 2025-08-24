<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    public $timestamps = false;

    protected $fillable = ['product_id','embed_id','type','data','ip','ua','created_at'];

    protected $casts = [
        'data' => 'array',
        'created_at' => 'datetime',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function embed(): BelongsTo
    {
        return $this->belongsTo(Embed::class);
    }
}
