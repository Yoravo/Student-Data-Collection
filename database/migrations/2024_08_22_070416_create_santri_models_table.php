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
        Schema::create('santri_models', function (Blueprint $table) {
            $table->integer('id_santri', true);
            $table->String('nama_santri');
            $table->String('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->String('alamat');
            $table->String('no_hp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santri_models');
    }
};
