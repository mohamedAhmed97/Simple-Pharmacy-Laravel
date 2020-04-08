<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicinePharmacyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_pharmacy', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pharmacy_id')->references('id')->on('pharmacies')->onDelete('cascade');
            $table->foreignId('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine_pharmacy');
    }
}
