<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResponsibleMemberId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_training_date', function (Blueprint $table) {
            $table->unsignedInteger('responsible_id')->default(1)->after('date');
            $table->foreign('responsible_id')->references('id')->on('vpf')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_training_date', function (Blueprint $table) {
            $table->dropColumn('responsible_id');
        });
    }
}
