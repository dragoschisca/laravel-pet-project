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
        Schema::create('jucators', function (Blueprint $table) {
            $table->id();
            $table->string('Nume');
            $table->string('Prenume');
            $table->string('Club');
            $table->string('Pozitia');
            $table->integer('Varsta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jucators');
    }
};
