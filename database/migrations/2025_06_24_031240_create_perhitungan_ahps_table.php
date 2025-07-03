<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perhitungan_ahps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('input_data_id');
            $table->integer('hasil_perhitungan');
            $table->integer('consistency_ratio');

            $table->foreign('input_data_id')->references('id')->on('input_datas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perhitungan_ahps');
    }
};
