<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'document', 'document_number', 'full_name', 'phone'
    ];
}
