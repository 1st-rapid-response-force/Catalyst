<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFormColumnsClassCompletion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_completions', function (Blueprint $table) {
            $table->string('form_name')->default('Class Completion Form')->after('date_id');
            $table->string('form_type')->default('class-completion')->after('form_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_completions', function (Blueprint $table) {
            $table->dropColumn('form_name');
            $table->dropColumn('form_type');
        });
    }
}
