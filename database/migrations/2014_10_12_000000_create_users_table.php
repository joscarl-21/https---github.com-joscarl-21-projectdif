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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('rol')->nullable();
            $table->string('username')->nullable();
            $table->string('noempleado')->nullable();
            $table->string('name')->nullable();
            $table->string('apaterno')->nullable();
            $table->string('amaterno')->nullable();
            $table->string('fechanacimiento')->nullable();
            $table->integer('id_sexo')->nullable();
            $table->string('email')->unique()->nullable();
            $table->integer('id_departamento')->nullable();
            $table->integer('id_puesto')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
