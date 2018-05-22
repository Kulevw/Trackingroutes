<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesGeolocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes_geolocations', function (Blueprint $table) {
            $table->increments('id');
            $table->double('latitude');
            $table->double('longitude');
            $table->double('altitude')->default(0);

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
        Schema::dropIfExists('routes_geolocations');
    }
}
