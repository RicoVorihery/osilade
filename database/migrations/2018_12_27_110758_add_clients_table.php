<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref_client',100)->unique();
            $table->string('nom_societe',100)->unique();
            $table->text('adresse')->nullable();
            $table->string('ville',60)->nullable();
            $table->string('code_postal')->nullable();
            $table->string('tel_principal');
            $table->string('contact1')->nullable();
            $table->string('tel1')->nullable();
            $table->string('mail1')->nullable();
            $table->string('contact2')->nullable();
            $table->string('tel2')->nullable();
            $table->string('mail2')->nullable();
            $table->string('contact3')->nullable();
            $table->string('tel3')->nullable();
            $table->string('mail3')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
