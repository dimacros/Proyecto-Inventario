<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $fillable = [
		'customer_id', 'discount', 'sub_total', 'status', 'note', 'user_id'
	];

	public function details() {
		return $this->hasMany(InvoiceDetail::class);
	}

	public function customer() {
		return $this->belongsTo(Customer::class);
	}

	public function user() {
		return $this->belongsTo(User::class);
	}
}
