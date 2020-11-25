<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('price');
            $table->string('image');
            $table->timestamps();

        });


        Schema::create('offer_translations',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('offer_id');
            $table->string('name');
            $table->text('description');
            $table->string('locale');

            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
