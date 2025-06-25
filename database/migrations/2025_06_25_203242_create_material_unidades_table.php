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
        Schema::create('material_unidades', function (Blueprint $table) {
            $table->increments('idMaterialUnidad');
            $table->integer('cantidad');
            $table->unsignedInteger('idUnidad');
            $table->unsignedInteger('idMaterial');
            // campo opcional si una MaterialUnidad lleva un presupuesto asociado
            $table->unsignedInteger('codigoPresupuesto')->nullable();

            // llaves foráneas
            $table->foreign('idUnidad')
                  ->references('idUnidad')
                  ->on('unidades')
                  ->onDelete('cascade');

            $table->foreign('idMaterial')
                  ->references('codigo')
                  ->on('materiales')
                  ->onDelete('cascade');

            $table->foreign('codigoPresupuesto')
                  ->references('codigoPresupuesto')
                  ->on('presupuestos')
                  ->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_unidades');
    }
};
