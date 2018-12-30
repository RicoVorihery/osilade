<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParametresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_materiels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('type_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('type_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre')->unique();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('type_materiels');
        Schema::dropIfExists('type_infos');
        Schema::dropIfExists('type_services');
    }
}
