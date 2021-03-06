<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_name');
            $table->string('Deliver_Address');
            $table->timestamps();
            $table->foreignId('dr_id')->references('id')->on('pharmacies')->onDelete('cascade')->nullable();
            $table->foreignId('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->string('isinsured');
            $table->string('status')->default("Waiting");
            $table->integer('quantity')->nullable(); 
            $table->float('price')->nullable();
            $table->float('totalprice')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
