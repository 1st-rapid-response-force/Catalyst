<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVPFFileCorrections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_corrections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vpf_id');
            $table->string('form_name')->default('VPF Correction Request');
            $table->string('form_type')->default('vpf_cr');
            $table->string('name');
            $table->string('grade');
            $table->string('date')->default(time());
            $table->string('organization')->default('1st Rapid Response Force');
            $table->text('correction_summary');
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
        Schema::drop('file_corrections');
    }
}
