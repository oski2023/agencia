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
        Schema::create('regiones', function (Blueprint $table) {
            //$table->id();
            /* Crea una columna INT UNSIGNED clave primaria auto_incremental llamada id */
            $table ->tinyIncrements('idRegion');
            $table->string('nombre',45)->unique();
            //$table->timestamps();
            /* 
             *crea dos columnas de tipo Timestampphp
             *una llamada "updated_at" y otra llamada "created_at"
            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regiones');
    }
};
