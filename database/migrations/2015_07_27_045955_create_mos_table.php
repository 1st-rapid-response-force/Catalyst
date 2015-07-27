<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mos')->unique();
            $table->unsignedInteger('rank_limitation_id');
            $table->text('description')->default('');
            $table->text('requirements')->default('');
            $table->text('video_embed')->default('');
            $table->timestamps();
            $table->foreign('rank_limitation_id')->references('id')->on('ranks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mos');
    }
}
