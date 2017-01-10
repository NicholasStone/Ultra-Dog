<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->rememberToken();
			$table->string('tel',16)->nullable();
			$table->string('qq',10)->nullable();
			$table->string('we_chat',50)->nullable();
			$table->string('real_name')->nullable();
			$table->boolean('gender')->nullable();
			$table->date('birthday')->nullable();
			$table->char('id_number',18)->nullable();
			$table->string('university')->nullable();
			$table->text('resume')->nullable();
			$table->string('avatar')->nullable();
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
		Schema::dropIfExists('users');
    }
}
