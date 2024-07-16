<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentbankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contentbank', function (Blueprint $table) {
            // Identificador de CONTENIDO DE BANCO
            $table->unsignedBigInteger('BankId')->notNullable();
            // Llave foránea para identificar libro
            $table->unsignedBigInteger('SampleBookId')->notNullable();
            // Estado del LIBRO
            $table->enum('state', ['Observado', 'Incompleto', 'Completo'])->default('Incompleto');
            // Asignación de la llave primaria compuesta
            $table->primary(['BankId', 'SampleBookId']);

            // Definición de las llaves foráneas
            $table->foreign('BankId')->references('Id')->on('bankbooks')->onDelete('cascade');
            $table->foreign('SampleBookId')->references('Id')->on('samplebooks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contentbank');
    }
}
