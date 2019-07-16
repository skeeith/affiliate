<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('permission_id')->unsigned();
            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->bigInteger('role_user_id')->unsigned();
            $table->foreign('role_user_id')
                ->references('id')
                ->on('role_user')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role_user');
    }
}
