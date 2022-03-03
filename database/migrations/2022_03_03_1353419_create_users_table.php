<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 45)->nullable();
            $table->string('surname', 45)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile', 45)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->integer('room_id')->unsigned();
            $table->integer('role_id')->unsigned();

          


            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onDelete('no action')
                ->onUpdate('no action');

                $table->foreign('room_id')
                ->references('id')->on('rooms')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
