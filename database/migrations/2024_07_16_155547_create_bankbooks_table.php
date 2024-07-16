<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankbooks', function (Blueprint $table) {
            // Identificador de BANCO DE LIBRO
            $table->id('Id');
            // Cantidad de libros en el BANCO
            $table->integer('quantity')->notNullable();
            // Observación del contenido del BANCO
            $table->string('observation', 255)->charset('utf8mb4')->notNullable();
            // Estado del BANCO DE LIBROS
            $table->enum('state', ['Completo', 'Incompleto', 'Observado'])->default('Completo');
            // Timestamps para created_at y updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bankbooks');
    }
}
