<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelocationsGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relocations_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->double('latitude');
            $table->double('longitude');
            $table->double('altitude')->default(0);
            $table->dateTime('date_time');

            $table->integer('group_id')->unsigned();
            $table
                ->foreign('group_id')
                ->references('id')
                ->on('groups');
                
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
        Schema::dropIfExists('relocations_groups');
    }
}
