<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlienciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klienci', function (Blueprint $table) {
            $table->id();
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('telefon');
            $table->string('pesel');
            $table->string('plec');
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
        Schema::dropIfExists('klienci');
    }
}
