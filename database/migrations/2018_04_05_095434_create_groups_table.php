<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_plan');
            $table->date('end_plan');
            $table->date('start_fact')->nullable();
            $table->date('end_fact')->nullable();

            $table->integer('guide_id')->unsigned();
            $table
                ->foreign('guide_id')
                ->references('id')
                ->on('guides');

            $table->integer('route_id')->unsigned();
            $table
                ->foreign('route_id')
                ->references('id')
                ->on('routes');

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
        Schema::dropIfExists('groups');
    }
}
