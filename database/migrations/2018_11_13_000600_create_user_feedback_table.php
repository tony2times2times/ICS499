<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFeedbackTable extends Migration
{

    protected $table = 'user_feedback';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_feedback', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('user_feedback', function ($table) {
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
        Schema::dropIfExists('user_feedback');
    }
}
