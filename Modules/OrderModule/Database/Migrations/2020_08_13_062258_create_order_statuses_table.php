<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_status_type_id');
            $table->timestamps();
            $table->foreign('order_status_type_id')->references('id')->on('order_status_types');
        });

        Schema::create('order_status_translations', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('order_status_id');
            $table->string('name');
            $table->string('locale');
            $table->foreign('order_status_id')->references('id')->on('order_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_status_translations');
        Schema::dropIfExists('order_statuses');
    }
}
