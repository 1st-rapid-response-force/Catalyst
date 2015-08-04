<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLoadoutsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loadouts_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('qualification_id')->nullable();
            $table->enum('category',['primary','secondary','launcher','thrown','uniform','vest','backpack','helmet','goggles','nightvision','binoculars','primary_attachments','secondary_attachments','launcher_attachments','items']);
            $table->string('name');
            $table->string('class_name');
            $table->string('storage_image');
            $table->string('public_image');
            $table->boolean('empty')->default(false);
            $table->timestamps();
        });

        Schema::create('loadouts_vpf', function(Blueprint $table)
        {
            $table->unsignedInteger('vpf_id');
            $table->unsignedInteger('loadout_id');
            $table->engine = 'InnoDB';
            $table->primary(['vpf_id', 'loadout_id']);
            $table->foreign('vpf_id')->references('id')->on('vpf')->onDelete('cascade');
            $table->foreign('loadout_id')->references('id')->on('loadouts_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('loadouts_vpf');
        Schema::drop('loadouts_items');
    }
}
