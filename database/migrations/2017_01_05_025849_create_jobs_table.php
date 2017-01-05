<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            //发布者
            $table->unsignedInteger('publisher');
            $table->tinyInteger('status');
            $table->unsignedInteger('reward');
            $table->text('describe');
            $table->string('start_at');
            //总工作时长
            $table->string('maintain');
            $table->unsignedTinyInteger('work_hours_pre_day');
            $table->string('cover');
            $table->softDeletes();
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
        Schema::dropIfExists('jobs');
    }
}
