<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.33]
// Copyright Reserved  [it v 1.6.33]
class CreateAzkarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('azkars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('number');
            $table->bigInteger('category_id');
            $table->longtext('simple_description')->nullable();
            $table->longtext('description')->nullable();
            $table->longtext('zakar')->nullable();
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
        Schema::dropIfExists('azkars');
    }
}
