<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTrainingDateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_training_date_user', function (Blueprint $table) {
            $table->unsignedInteger('vpf_id');
            $table->unsignedInteger('school_date_id');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->primary(['vpf_id', 'school_date_id']);
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
            $table->foreign('school_date_id')->references('id')->on('school_training_date')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('school_training_date_user');
    }
}
