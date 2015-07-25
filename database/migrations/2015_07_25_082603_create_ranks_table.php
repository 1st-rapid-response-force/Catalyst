<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('abbreviation');
            $table->string('name');
            $table->string('pay_grade');
            $table->string('image');
            $table->integer('promotionPointsRequired')->default(0);
            $table->integer('tigRequired')->default(0);
            $table->string('trainingRequired');
            $table->integer('weight');
            $table->unsignedInteger('next_rank');
            $table->unsignedInteger('teamspeakGroup')->nullable();
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
        Schema::drop('ranks');
    }
}
