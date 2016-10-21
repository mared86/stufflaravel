<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
        });
        Schema::create('stuff_tag', function (Blueprint $table) {
            $table->integer("stuff_id")->unsigned();
            $table->foreign("stuff_id")->references("id")->on("stuffs");
            $table->integer("tag_id")->unsigned();
            $table->foreign("tag_id")->references("id")->on("tags");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
