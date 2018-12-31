<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateInfoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_users', function (Blueprint $table) {
            $table->string('service',30)->nullable()->before('login');
            $table->string('prenom',200)->nullable()->before('login');
            $table->string('nom',60)->nullable()->before('login');

            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_users', function (Blueprint $table) {
            //
        });
    }
}
