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
        Schema::create('super_admins', function (Blueprint $table) {
            $table->id('id_superadmin');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_sampah');
            $table->string('id_admin', 50);
            $table->string('nama', 100);
            $table->string('password');
            $table->string('email', 100)->unique();
            $table->timestamps();

            $table->foreign('id_user')
                  ->references('id_user')
                  ->on('users')
                  ->onDelete('cascade');
            
            $table->foreign('id_sampah')
                  ->references('id_sampah')
                  ->on('sampahs')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('super_admins');
    }
};
