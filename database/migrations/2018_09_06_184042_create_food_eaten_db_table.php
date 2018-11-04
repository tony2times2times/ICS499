<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodEatenDbTable extends Migration
{

    protected $table = 'food_eaten';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_eaten', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('food_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('meal')->nullable();
            $table->integer('number_servings');
            $table->timestamps();
        });

        Schema::table('food_eaten', function ($table) {
            $table->foreign('food_id')
                ->references('id')
                ->on('foods')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_eaten');
    }
}
