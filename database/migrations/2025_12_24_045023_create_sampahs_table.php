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
    Schema::create('tb_sampah', function (Blueprint $table) {
        $table->id('id_sampah');
        $table->foreignId('id_user')->constrained('tb_user', 'id_user')->onDelete('cascade');
        $table->string('kriteria');
        $table->double('berat');
        $table->string('jenis');
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampahs');
    }
};
