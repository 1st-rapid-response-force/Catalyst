<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubjecttoUnitAnnoucements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unit_announcements', function (Blueprint $table) {
            $table->string('subject')->after('vpf_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unit_announcements', function (Blueprint $table) {
            $table->dropColumn('subject');
        });
    }
}
