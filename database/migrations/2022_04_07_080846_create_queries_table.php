<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queries', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('city_id')->nullable();
            $table->string('country_id')->nullable();
            $table->string('project_id')->nullable();
            $table->string('area_id')->nullable();
            $table->string('sources_id')->nullable();
            $table->string('desc')->nullable();
            $table->string('person_id')->nullable();
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
        Schema::dropIfExists('queries');
    }
}
