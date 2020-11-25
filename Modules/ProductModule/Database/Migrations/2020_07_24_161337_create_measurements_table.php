<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });

        Schema::create('measurement_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('measurement_id');
            $table->string('name');
            $table->string('locale');

            $table->foreign('measurement_id')->references('id')->on('measurements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measurement_translations');
        Schema::dropIfExists('measurements');
    }
}
