<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDischargeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discharges', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vpf_id');
            $table->string('form_name')->default('Discharge Paperwork');
            $table->string('form_type')->default('discharge');
            $table->string('name');
            $table->string('grade');
            $table->string('date')->default(time());
            $table->string('organization')->default('1st Rapid Response Force');
            $table->string('discharge_type');
            $table->text('discharge_text')->default('');
            $table->string('discharger_name');
            $table->string('discharger_grade');
            $table->string('discharger_organization')->default('1st Rapid Response Force');
            $table->string('discharger_signature');
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
        Schema::drop('Discharges');
    }
}
