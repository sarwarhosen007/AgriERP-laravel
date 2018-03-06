<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCropWeeklyTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crop_weekly_tasks', function (Blueprint $table) {
            $table->increments('WeekId');
            $table->integer('WeekNumber');
            $table->integer('CropId')->unsigned();
            $table->integer('CropInsectSysId')->unsigned();
            $table->integer('CropFertSysId')->unsigned();
            $table->string('FertilizerTask');
            $table->string('InsecticideTask');
            $table->string('OtherTask');
            $table->timestamps();

            $table->foreign('CropId')->references('CropId')->on('crops');
            $table->foreign('CropInsectSysId')->references('InsecticideId')->on('insecticides');
            $table->foreign('CropFertSysId')->references('FertilizerId')->on('fertilizers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crop_weekly_tasks');
    }
}
