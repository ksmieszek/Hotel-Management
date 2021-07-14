<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRezerwacjeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rezerwacje', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pokoju');
            $table->integer('id_klienta');
            $table->date('data_rozpoczecia');
            $table->date('data_zakonczenia');
            $table->float('razem');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rezerwacje');
    }
}
