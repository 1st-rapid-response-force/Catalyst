<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfractionReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infraction_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vpf_id');
            $table->string('form_name')->default('Infraction Report');
            $table->string('form_type')->default('ir');
            $table->string('violator_name');
            $table->text('violation_summary');
            $table->boolean('reviewed');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('infraction_reports');
    }
}
