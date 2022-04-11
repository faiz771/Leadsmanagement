<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('developer');
            $table->string('name');
            $table->string('contact')->nullable();
            $table->text('about')->nullable();
            $table->longText('project_img')->nullable();
            $table->longText('floor_plan')->nullable();
            $table->longText('payment_plan')->nullable();
            $table->longText('project_booklet')->nullable();
            $table->longText('socialmedia_links')->nullable();
            $table->text('location')->nullable(); 
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
        Schema::dropIfExists('projects');
    }
}
