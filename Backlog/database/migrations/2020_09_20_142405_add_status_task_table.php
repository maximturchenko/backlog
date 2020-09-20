<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_task', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('backlogs', function (Blueprint $table) {            
            $table->unsignedBigInteger('status_id')->nullable();   
            $table->foreign('status_id')->references('id')->on('status_task');  
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_task');

        Schema::table('backlogs', function (Blueprint $table) {
            $table->dropColumn('status_id');
        });
    }
}
