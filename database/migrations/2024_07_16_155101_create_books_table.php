<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            // Identificador de LIBRO
            $table->id('Id');
            // ABREVIATURA DEL LIBRO
            $table->char('Abreviature', 5)->charset('ascii')->notNullable();
            // TITULO DEL LIBRO
            $table->string('Title', 256)->charset('utf8mb4')->notNullable();
            // Grado
            $table->enum('Grade', ['PRIMERO', 'SEGUNDO', 'TERCERO', 'CUARTO', 'QUINTO'])->default('PRIMERO');
            // Area al que pertenece
            $table->string('Category', 11)->charset('utf8mb4')->notNullable();
            // Cantidad de ejemplares del LIBRO
            $table->integer('Quantity')->notNullable();
            // Año de recepcion del LIBRO
            $table->year('Year')->notNullable();
            // Observaciones de los [EJEMPLARES DE LIBROS]
            $table->string('Observation', 254)->charset('utf8mb4')->nullable();
            // Estado de los [EJEMPLARES DE LIBROS]
            $table->enum('State', ['Completo', 'Incompleto'])->default('Incompleto');
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
        Schema::dropIfExists('books');
    }
}
