<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusColumnsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('order_status_type_id')->default(1);
            $table->unsignedBigInteger('order_status_id')->default(1);
            $table->foreign('order_status_type_id')->references('id')->on('order_status_types');
            $table->foreign('order_status_id')->references('id')->on('order_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_order_status_type_id_forien');
            $table->dropForeign('orders_order_status_id_forien');
            $table->dropColumn('order_status_type_id','order_status_id');
        });
    }
}
