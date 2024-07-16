<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentbankstudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignmentbankstudent', function (Blueprint $table) {
            // Identificador de BANCO DE LIBRO
            $table->id('Id');
            // Llave foránea para identificar banco asignado
            $table->unsignedBigInteger('BankBooksId')->notNullable();
            // Llave foránea para identificar estudiante
            $table->unsignedBigInteger('StudentId')->notNullable();
            // Estado de asignación de banco
            $table->enum('StateAssignBank', ['Entregado', 'Devuelto', 'Observado'])->default('Entregado')->charset('utf8mb4');
            // Fecha de entrega de libro
            $table->date('Deadline')->notNullable();
            // Fecha de recepción de libro
            $table->date('ReceptionDate')->notNullable();
            // Observación sobre la asignación del banco
            $table->string('observation', 255)->charset('utf8mb4')->notNullable();
            // Timestamps para created_at y updated_at
            $table->timestamps();

            // Definición de las llaves foráneas
            $table->foreign('BankBooksId')->references('Id')->on('bankbooks')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignmentbankstudent');
    }
}
