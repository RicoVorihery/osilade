<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_client');
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade');
            $table->string('titre',200)->unique();
            $table->text('reference');
            $table->string('file01')->nullable();
            $table->string('file02')->nullable();
            $table->string('file03')->nullable();
            $table->string('file04')->nullable();
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
        Schema::dropIfExists('references');
    }
}
