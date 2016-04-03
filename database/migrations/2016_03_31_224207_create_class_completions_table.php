<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassCompletionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_completions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vpf_id');
            $table->unsignedInteger('date_id');
            $table->integer('status')->default(1);
            $table->string('attendees');
            $table->string('observers')->nullable();
            $table->string('helpers')->nullable();
            $table->text('comments')->nullable();
            $table->text('rewards')->nullable();
            $table->text('issues')->nullable();
            $table->timestamps();

            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
            $table->foreign('date_id')->references('id')->on('school_training_date')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('class_completions');
    }
}
