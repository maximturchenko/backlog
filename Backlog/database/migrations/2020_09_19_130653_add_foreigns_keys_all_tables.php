<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignsKeysAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('backlogs', function (Blueprint $table) { 
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('sprint_id')->references('id')->on('sprints'); 
        });
        Schema::table('estimates', function (Blueprint $table) { 
            $table->foreign('task_id')->references('id')->on('backlogs'); 
        });
        Schema::table('sprints', function (Blueprint $table) { 
            $table->foreign('status_id')->references('id')->on('statuses');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
