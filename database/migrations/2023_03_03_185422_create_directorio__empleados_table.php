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
        Schema::create('directorio__empleados', function (Blueprint $table) {
            $table->id('id');
            $table->string('oficina');
            $table->string('extension');

            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directorio__empleados');
    }
};
