<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlisonStaticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alison_statics', function (Blueprint $table) {
            $table->id();
            $table->integer('learners_quantity'); 
            $table->integer('graduates_quantity'); 
            $table->integer('courses_quantity'); 
            $table->integer('countries_quantity'); 
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
        Schema::dropIfExists('alison_statics');
    }
}
