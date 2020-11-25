<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStatusTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_status_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('order_status_type_translations', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('order_status_type_id');
            $table->string('name');
            $table->string('locale');
            $table->foreign('order_status_type_id')->references('id')->on('order_status_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_status_type_id');
        Schema::dropIfExists('order_status_types');
    }
}
