<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo_precio');
            $table->boolean('aire_acondicionado');
            $table->string('transmision');
            $table->string('modulo');
            $table->tinyInteger('num_pasajeros');
            $table->tinyInteger('num_maletas');
            $table->decimal('precio');
            $table->string('moneda');
            $table->string('imagen');
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
        Schema::dropIfExists('autos');
    }
}
