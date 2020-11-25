<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type');
            $table->integer('cat_type');
            $table->integer('cat_id');
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('config_category_id')->references('id')->on('config_categories')->onDelete('cascade');
        });

        Schema::create('slider_translations',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('slider_id');
            $table->string('name');
            $table->string('locale');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_translations');
        Schema::dropIfExists('configs');
    }
}
