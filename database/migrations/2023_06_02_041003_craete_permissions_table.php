<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CraetePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->string('name');
            $table->json('permission_lists');
            $table->string('table_name');
            $table->string('details')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
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
