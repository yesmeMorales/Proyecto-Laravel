<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfessionIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creation of the profession_id field in the users table and its relation to the professions table
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('profession_id')->unsigned()->nullable();
            $table->foreign('profession_id')->references('id')->on('professions')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['profession_id']);
            $table->dropColumn('profession_id');
        });
    }
}
