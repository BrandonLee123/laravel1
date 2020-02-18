<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdmin extends Migration
{
   
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
        $table->boolean('is_admin')->default(false);
        $table->string('gender')->default('');
        $table->string('country')->default('');
        $table->string('state')->default('');
        $table->string('city')->default('');
        $table->string('zip')->default('');
        $table->string('address')->default('');
        $table->string('phonenum')->default('');
        $table->string('image_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
        Schema::table('users', function (Blueprint $table){
        $table->dropColumn('image_url');
        $table->dropColumn('is_admin');
        $table->dropColumn('gender');
        $table->dropColumn('country');
        $table->dropColumn('state');
        $table->dropColumn('city');
        $table->dropColumn('zip');
        $table->dropColumn('address');
        $table->dropColumn('phonenum');
        
        });
    }
}
