<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->increments('id');
            $table->char('product_id')->unsigned()->nullable();
            $table->int('quantity');
            $table->decimal('price');
            $table->char('invoice_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('product_id')
                  ->references('id')->on('products')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('invoice_id')
                  ->references('id')->on('invoices')
                  ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }
}
