<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.33]
// Copyright Reserved  [it v 1.6.33]
class CreateWerdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('werds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->longtext('werd');
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
        Schema::dropIfExists('werds');
    }
}