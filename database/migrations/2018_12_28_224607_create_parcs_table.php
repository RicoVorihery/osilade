<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_client');
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade');
            $table->string('ref_inventaire',20)->unique();
            $table->unsignedInteger('id_type_materiel');
            $table->foreign('id_type_materiel')->references('id')->on('type_materiels')->onDelete('cascade');
            $table->text('info1',300)->nullable();
            $table->string('ip01',16)->nullable(); //255.255.255.255
            $table->string('ip02',16)->nullable();
            $table->string('ip03',16)->nullable();
            $table->string('ip04',16)->nullable();
            $table->string('nom',20)->nullable();
            $table->string('login',15)->nullable();
            $table->string('pass',15)->nullable();
            $table->string('id_tv',20)->nullable();
            $table->string('os',15)->nullable();
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
        Schema::dropIfExists('parcs');
    }
}
