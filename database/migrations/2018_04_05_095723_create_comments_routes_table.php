<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment');

            $table->integer('route_id')->unsigned();
            $table
                ->foreign('route_id')
                ->references('id')
                ->on('routes');

            $table->integer('user_id')->unsigned();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->dateTime('date_time');
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
        Schema::dropIfExists('comments_routes');
    }
}
