<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsecticidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insecticides', function (Blueprint $table) {
            $table->increments('InsecticideId');
            $table->string('Name');
            $table->float('PricePerUnit');
            $table->string('InsectName');
            $table->string('DiseaseName');
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
        Schema::dropIfExists('insecticides');
    }
}
