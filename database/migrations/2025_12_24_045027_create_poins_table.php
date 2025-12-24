<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
    Schema::create('tb_poin', function (Blueprint $table) {
        $table->id('id_poin');
        $table->foreignId('id_user')->constrained('tb_user', 'id_user')->onDelete('cascade');
        $table->foreignId('id_sampah')->constrained('tb_sampah', 'id_sampah')->onDelete('cascade');
        $table->integer('jumlah_poin');
        $table->string('aksi');
        $table->string('status');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poins');
    }
};
