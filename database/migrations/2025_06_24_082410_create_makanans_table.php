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
        Schema::create('makanans', function (Blueprint $table) {
            $table->id();
            $table->string('gambar_makanan');
            $table->string('nama_makanan');
            $table->enum('type_protein', ['Hewani', 'Nabati']);
            $table->enum('type_makanan', ['Makanan', 'Minuman']);
            $table->integer('protein');
            $table->integer('karbohidrat');
            $table->integer('lemak');
            $table->integer('asam_folat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('makanans');
    }
};
