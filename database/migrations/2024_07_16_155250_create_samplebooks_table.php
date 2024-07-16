<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamplebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samplebooks', function (Blueprint $table) {
            // Identificador de LIBRO
            $table->id('Id');
            // Llave foranea a los libros generales
            $table->unsignedBigInteger('BookId')->notNullable();
            // Codigo General
            $table->char('Code', 4)->charset('ascii')->notNullable();
            // Observación sobre el estado del libro
            $table->string('Observation', 256)->charset('utf8mb4')->notNullable();
            // Estado del Libro
            $table->enum('State', ['Normal', 'Perdido', 'Dañado'])->default('Normal');
            // Timestamps para created_at y updated_at
            $table->timestamps();

            // Definición de la llave foránea
            $table->foreign('BookId')->references('Id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samplebooks');
    }
}
