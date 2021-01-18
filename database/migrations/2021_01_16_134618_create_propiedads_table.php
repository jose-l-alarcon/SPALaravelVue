<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropiedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug');
            $table->timestamps();
        });


        Schema::create('propiedads', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('categoria_id')->constrained();
            $table->string('imagen_principal');
            $table->string('direccion');
            $table->string('zona')->nullable();
            $table->string('lat');
            $table->string('lng');
            $table->string('telefono');
            $table->text('descripcion');
            //utilizado para las imagenes galeria 
            $table->uuid('uuid');
            // referencia a tabla user 
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('propiedades');
        Schema::dropIfExists('categorias');
    }
}
