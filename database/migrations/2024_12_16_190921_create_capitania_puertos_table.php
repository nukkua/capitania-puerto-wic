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
        Schema::create('capitania_puertos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_capitania');
            $table->string('nombre_terminal_portuaria');
            $table->date('fecha');
            $table->string('matricula');
            $table->string('tipo_carga');
            $table->decimal('toneladas', 10, 2);
            $table->date('fecha_ingreso_muelle');
            $table->date('fecha_salida_muelle');
            $table->date('fecha_inicio_operacion');
            $table->date('fecha_fin_operacion');
            $table->time('horas_permanencia');
            $table->time('horas_paralizacion');
            $table->time('horas_amarre');
            $table->time('horas_des_amarre');
            $table->time('tiempo_disponible_en_muelle');
            $table->string('metros_lineales_muelle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capitania_puertos');
    }
};
