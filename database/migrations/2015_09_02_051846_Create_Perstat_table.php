<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerstatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perstat', function (Blueprint $table) {
            $table->increments('id');
            $table->date('from');
            $table->date('to');
            $table->string('unit')->default('1st Rapid Response Force');
            $table->unsignedInteger('assigned')->default(0);
            $table->boolean('active')->default(false);
            $table->timestamps();
        });

        Schema::create('perstat_vpf', function (Blueprint $table) {
            $table->unsignedInteger('vpf_id');
            $table->unsignedInteger('perstat_id');
            $table->engine = 'InnoDB';
            $table->primary(['vpf_id', 'perstat_id']);
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
            $table->foreign('perstat_id')->references('id')->on('perstat')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('perstat_vpf');
        Schema::drop('perstat');
    }
}
