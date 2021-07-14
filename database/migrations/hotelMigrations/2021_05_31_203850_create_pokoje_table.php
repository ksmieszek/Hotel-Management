<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokojeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokoje', function (Blueprint $table) {
            $table->id();
            $table->string('numer_pokoju');
            $table->string('pietro');
            $table->string('wyposazenie');
            $table->string('status');
            $table->string('stan');
            $table->float('cena');
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
        Schema::dropIfExists('pokoje');
    }
}
