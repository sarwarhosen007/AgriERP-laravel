<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crops', function (Blueprint $table) {
            $table->increments('CropId');
            $table->string('Name');
            $table->string('TimePeriod');
            $table->integer('TotalCost');
            $table->string('EstimatedProduction');
            $table->string('LandType');
            $table->string('WaterSource');
            $table->string('CropGroupName');
            $table->integer('TotalWeeks');
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
        Schema::dropIfExists('crops');
    }
}
