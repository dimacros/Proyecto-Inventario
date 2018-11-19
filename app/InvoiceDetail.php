<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
	protected $fillable = [
		'product_id', 'quantity', 'price', 'invoice_id'
	];

	public function product() {
		return $this->hasOne(Product::class);
	}

	public function invoice() {
		return $this->belongsTo(Invoice::class);
	}
}
