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
        Schema::create('requisiciones', function (Blueprint $table) {
            $table->increments('idRequisicion');
            $table->dateTime('fecha');
            $table->string('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisiciones');
    }
};
