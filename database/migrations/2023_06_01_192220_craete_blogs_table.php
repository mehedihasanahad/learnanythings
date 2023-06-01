<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CraeteBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->json('tag_ids');
            $table->string('title');
            $table->string('sub_title');
            $table->longText('content');
            $table->string('image');
            $table->string('small_img');
            $table->string('template');
            $table->tinyInteger('is_featured');
            $table->tinyInteger('status')->comment('-1 = pending approval; 1 = approved; 0 = refused;');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
