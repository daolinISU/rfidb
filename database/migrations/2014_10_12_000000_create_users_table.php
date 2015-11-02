<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'users',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('email')->unique();
                $table->string('first_name', 50);
                $table->string('last_name', 50);
                $table->string('organization');
                $table->string('reason');
                $table->string('password', 60);
                $table->string('role')->default("reg");
                $table->string('activation_code');
                $table->tinyInteger('status')->default(0);
                $table->rememberToken();
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
        Schema::drop('users');
    }
}
