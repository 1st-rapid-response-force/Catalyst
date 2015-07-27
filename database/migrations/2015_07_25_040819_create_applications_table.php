<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('status')->default('Under Review');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->string('nationality');
            $table->unsignedInteger('mos_id')->default('1');
            $table->boolean('milsim_experience')->default('0');
            $table->boolean('milsim_badconduct')->default('0');
            $table->text('milsim_grouplist')->default('');
            $table->string('milsim_highestrank')->default('');
            $table->string('milsim_previoustraining')->default('');
            $table->text('milsim_depature')->default('');
            $table->boolean('agreement_milsim')->default('1');
            $table->boolean('agreement_guidelines')->default('1');
            $table->boolean('agreement_orders')->default('1');
            $table->boolean('agreement_ranks')->default('1');
            $table->string('signature')->default('');
            $table->timestamp('signature_date');
            $table->string('processed_name')->default('Reilly, Jennifer');
            $table->string('processed_paygrade')->default('E-5');
            $table->string('processed_unitname')->default('Command Element');
            $table->string('processed_signature')->default('Jennifer Reilly');
            $table->string('processed_statement')->default('');
            $table->string('decision_name')->default('');
            $table->string('decision_paygrade')->default('');
            $table->string('decision_unitname')->default('');
            $table->string('decision_signature')->default('');
            $table->timestamp('decision_date');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('applications');
    }
}
