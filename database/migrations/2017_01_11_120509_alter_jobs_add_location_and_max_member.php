<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterJobsAddLocationAndMaxMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->addColumn('string', 'location', [
                'after'  => 'reward',
                'length' => 255,
            ]);
            $table->addColumn('tinyInteger', 'max_hire', [
                'unsigned',
                'after' => 'status',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('location');
            $table->dropColumn('max_hire');
        });
    }
}
