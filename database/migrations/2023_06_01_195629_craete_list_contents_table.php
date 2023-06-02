<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CraeteListContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('list_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('blog_id');
            $table->string('title');
            $table->string('sub_title');
            $table->longText('content');
            $table->string('image');
            $table->string('small_img');
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
            $table->foreign('blog_id')
                ->references('id')
                ->on('blogs')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }
}
