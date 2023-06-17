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
            $table->string('sub_title')->nullable();
            $table->longText('content')->nullable();
            $table->string('image');
            $table->string('small_img');
            $table->tinyInteger('content_type')->default(1)->comment('1 = default; 2 = list;');
            $table->tinyInteger('template')->default(1)->comment('1 = default; 2 = list;');
            $table->integer('hour')->default(0);
            $table->integer('minute')->default(0);
            $table->integer('second')->default(0);
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0 = pending approval; 1 = approved; 2 = refused;');
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
