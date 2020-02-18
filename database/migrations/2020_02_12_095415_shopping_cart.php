<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShoppingCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('cart_items', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('product_id');
        $table->double('price');
        $table->text('description');
        $table->string('user_id')->nullable();
        $table->string('session_id');
        $table->string('name');
        $table->integer('quantity');
        $table->timestamps( );
     });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
        
    }
}
