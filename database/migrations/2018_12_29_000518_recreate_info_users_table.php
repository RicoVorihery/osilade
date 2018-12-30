<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateInfoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_client');
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade');
            $table->string('nom',60);
            $table->string('prenom',200)->nullable();
            $table->string('service',30)->nullable();

            $table->unsignedInteger('id_type_info');
            $table->foreign('id_type_info')->references('id')->on('type_infos')->onDelete('cascade');
            $table->string('login',15)->nullable();
            $table->string('pass',15)->nullable();
            $table->text('notes')->nullable();

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
        Schema::dropIfExists('info_users');
    }
}
