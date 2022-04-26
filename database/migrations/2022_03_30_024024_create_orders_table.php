<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users');
            $table->double("total_price")->default(0);
            $table->integer("total_quantity")->default(0);
            $table->string('delivery_address');
            $table->dateTime('order_time')->useCurrent();
            $table->date("receive_date")->nullable();
            $table->date("promise_date")->nullable();
            $table->integer("status")->default(0);
            $table->text('notes', 500)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
