?<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClearanceLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vpf', function (Blueprint $table) {
            $table->unsignedInteger('clearance')->after('status')->default(34);
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
            $table->dropColumn('clearance');
        });
    }
}
