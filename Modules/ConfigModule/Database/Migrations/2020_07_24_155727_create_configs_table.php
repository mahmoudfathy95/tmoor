<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('config_category_id');
            $table->string('key');
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('config_category_id')->references('id')->on('config_categories')->onDelete('cascade');
        });

        Schema::create('config_translations',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('config_id');
            $table->string('name');
            $table->string('value');
            $table->string('locale');

            $table->foreign('config_id')->references('id')->on('configs')->onDelete('cascade');
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
