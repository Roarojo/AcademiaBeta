<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semestres', function (Blueprint $table) {
            $table->id();
            $table->string('semestre');
            $table->unsignedBigInteger('profesor_id');
            $table->foreign('profesor_id')->references('id')
                ->on('users')->onDelete('cascade');;
            $table->unsignedBigInteger('materia_id');
            $table->foreign('materia_id')->references('id')
                    ->on('materias')->onDelete('cascade');;
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
        Schema::dropIfExists('semestres');
    }
};
