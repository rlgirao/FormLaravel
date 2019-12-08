<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefrigerantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refrigerantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('marca',30);
            $table->enum('tipo',['Pet', 'Garrafa', 'Lata']);
            $table->enum('sabor',['Cola', 'Laranja', 'Limao', 'Uva', 'Guarana']);
            $table->enum('litragem', ['250mL', '600mL', '1L']);
            $table->float('valor', 10, 2);
            $table->integer('quantidade');
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
        Schema::dropIfExists('refrigerantes');
    }
}
