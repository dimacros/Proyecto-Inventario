<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'name', 'category_id', 'price'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
