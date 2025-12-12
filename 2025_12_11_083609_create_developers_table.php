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
    Schema::create('developers', function (Blueprint $table) {
        $table->id('id_developer');
        $table->string('nama_developer', 100)->unique();
        $table->string('negara', 50)->nullable();
        $table->integer('tahun_berdiri')->nullable();
        $table->text('deskripsi')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developers');
    }
};
