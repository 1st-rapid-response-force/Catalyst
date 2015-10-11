<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOnCall extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vpf', function(Blueprint $table)
        {
            $table->boolean('oncall_status')->after('clearance')->default(false);
            $table->string('oncall_phone')->after('oncall_status')->default('');
            $table->string('oncall_type')->after('oncall_phone')->default('none');
            $table->engine = 'InnoDB';
        });

        Schema::create('oncall', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vpf_id');
            $table->string('grid');
            $table->string('callsign');
            $table->string('urgency');
            $table->string('security');
            $table->text('other');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
        });
        Schema::create('oncall_vpf', function (Blueprint $table) {
            $table->unsignedInteger('oncall_id');
            $table->unsignedInteger('vpf_id');
            $table->engine = 'InnoDB';
            $table->primary(['oncall_id'.'vpf_id']);
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
            $table->foreign('oncall_id')->references('id')->on('oncall')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vpf', function (Blueprint $table) {
            $table->dropColumn('oncall_status');
            $table->dropColumn('oncall_phone');
            $table->dropColumn('oncall_type');
        });
        Schema::drop('oncall_vpf');
        Schema::drop('oncall');
    }
}
