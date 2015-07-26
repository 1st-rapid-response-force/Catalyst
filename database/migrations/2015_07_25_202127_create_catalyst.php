<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalyst extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //DISCIPLINARY ACTION
        Schema::create('article15', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('vpf_id');
            $table->string('name');
            $table->string('grade');
            $table->string('military_id');
            $table->date('current_date');
            $table->text('misconduct');
            $table->string('plea');
            $table->text('plan_of_action');
            $table->string('counselor_name')->default('Rodriguez, George');
            $table->string('counselor_rank')->default('');
            $table->string('counselor_organization')->default('1st RRF');
            $table->string('counselor_signature')->default('George Rodriguez');
            $table->timestamp('counselor_sig_date');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
        });
        Schema::create('dcs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('vpf_id');
            $table->string('name');
            $table->string('rank');
            $table->string('date')->default(time());
            $table->string('organization')->default('1st Rapid Response Force');
            $table->string('counselor_name');
            $table->text('reason_counseling');
            $table->text('key_points');
            $table->text('plan_of_action');
            $table->text('assessment')->default('');
            $table->dateTime('assessment_date')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
        });
        Schema::create('ncs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('vpf_id');
            $table->string('name');
            $table->string('rank');
            $table->string('date')->default(time());
            $table->string('organization')->default('1st Rapid Response Force');
            $table->string('counselor_name');
            $table->text('summary_infraction');
            $table->text('action_plan');
            $table->string('approval');
            $table->string('commander_name')->default('George Rodriguez');
            $table->string('commander_rank')->default('');
            $table->string('commander_assignment')->default('Commander of the 1st RRF');
            $table->timestamp('approval_date');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
        });
        Schema::create('vcs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('vpf_id');
            $table->string('name');
            $table->string('rank');
            $table->string('date')->default(time());
            $table->string('organization')->default('1st Rapid Response Force');
            $table->string('counselor_name');
            $table->text('summary_interaction');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
        });

        // PERSONNEL FILE
        Schema::create('promotion_points', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vpf_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->integer('model_type')->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
        });
        Schema::create('promotions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('vpf_id');
            $table->unsignedInteger('old_rank_id');
            $table->unsignedInteger('new_rank_id');
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
        });
        Schema::create('teamspeak', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('vpf_id');
            $table->string('uuid');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->unique('uuid');
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
        });

        // GENERAL PERSONAL FILE
        Schema::create('awards', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->integer('promotionPoints')->default(0);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::create('operations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->dateTime('date');
            $table->integer('promotionPoints')->default(0);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::create('qualifications', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->date('date');
            $table->integer('promotionPoints')->default(0);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::create('ribbons', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->integer('promotionPoints')->default(0);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::create('schools', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->text('docs');
            $table->text('videos');
            $table->integer('promotionPoints')->default(0);
            $table->text('prerequisites');
            $table->boolean('published');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('service_history', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('vpf_id');
            $table->text('note');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
        });

        //JOIN TABLES
        Schema::create('vpf_awards', function(Blueprint $table)
        {
            $table->unsignedInteger('vpf_id');
            $table->unsignedInteger('award_id');
            $table->date('date_awarded');
            $table->engine = 'InnoDB';
            $table->primary(['vpf_id', 'award_id']);
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
            $table->foreign('award_id')->references('id')->on('awards')->onDelete('cascade');
        });

        Schema::create('vpf_operations', function(Blueprint $table)
        {
            $table->unsignedInteger('vpf_id');
            $table->unsignedInteger('operation_id');
            $table->date('date_attended');
            $table->engine = 'InnoDB';
            $table->primary(['vpf_id', 'operation_id']);
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
            $table->foreign('operation_id')->references('id')->on('operations')->onDelete('cascade');
        });

        Schema::create('vpf_qualifications', function(Blueprint $table)
        {
            $table->unsignedInteger('vpf_id');
            $table->unsignedInteger('qualification_id');
            $table->date('date_awarded');
            $table->engine = 'InnoDB';
            $table->primary(['vpf_id', 'qualification_id']);
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
            $table->foreign('qualification_id')->references('id')->on('qualifications')->onDelete('cascade');
        });

        Schema::create('vpf_ribbons', function(Blueprint $table)
        {
            $table->unsignedInteger('vpf_id');
            $table->unsignedInteger('ribbon_id');
            $table->date('date_awarded');
            $table->engine = 'InnoDB';
            $table->primary(['vpf_id', 'ribbon_id']);
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
            $table->foreign('ribbon_id')->references('id')->on('ribbons')->onDelete('cascade');
        });

        Schema::create('vpf_schools', function(Blueprint $table)
        {
            $table->unsignedInteger('vpf_id');
            $table->unsignedInteger('school_id');
            $table->date('date_attended');
            $table->engine = 'InnoDB';
            $table->primary(['vpf_id', 'school_id']);
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vpf_awards');
        Schema::drop('vpf_operations');
        Schema::drop('vpf_qualifications');
        Schema::drop('vpf_ribbons');
        Schema::drop('vpf_schools');
        Schema::drop('article15');
        Schema::drop('dcs');
        Schema::drop('ncs');
        Schema::drop('vcs');
        Schema::drop('promotion_points');
        Schema::drop('promotions');
        Schema::drop('teamspeak');
        Schema::drop('awards');
        Schema::drop('operations');
        Schema::drop('qualifications');
        Schema::drop('ribbons');
        Schema::drop('schools');
        Schema::drop('service_history');
    }
}
