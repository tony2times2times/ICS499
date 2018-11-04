<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietPlanTable extends Migration
{
    protected $table = 'diet_plan';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('calories_day');
            $table->integer('weight');
            $table->date('target_date');
            $table->string('goal');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('diet_plan', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_plan');
    }
}
