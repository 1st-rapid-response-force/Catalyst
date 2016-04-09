<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vpf_id');
            $table->unsignedInteger('category_id');
            $table->string('title');
            $table->boolean('allDay')->default(false);
            $table->timestamp('start');
            $table->timestamp('end');
            $table->text('options')->nullable();
            $table->timestamps();
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');

        });

        Schema::create('event_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('status')->default(0);
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
        Schema::drop('event_categories');
        Schema::drop('events');
    }
}
