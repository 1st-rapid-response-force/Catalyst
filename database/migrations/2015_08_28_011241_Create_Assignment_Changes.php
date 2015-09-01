<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentChanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_changes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vpf_id');
            $table->string('form_name')->default('Assignment Change Request');
            $table->string('form_type')->default('assignment_change');
            $table->string('name');
            $table->string('grade');
            $table->string('date')->default(time());
            $table->string('organization')->default('1st Rapid Response Force');
            $table->text('request_reason');
            $table->boolean('approved')->default(false);
            $table->unsignedInteger('requested_assignment');
            $table->string('approved_by');
            $table->boolean('reviewed')->default(false);
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
        Schema::drop('assignment_changes');
    }
}
