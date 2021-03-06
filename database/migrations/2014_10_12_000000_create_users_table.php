<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name')->nullable()->comment('昵称');
            $table->string('email')->unique()->nullable()->index()->comment('邮箱');
            $table->string('mobile')->unique()->nullable()->index()->comment('手机');
            $table->string('password');
            $table->string('icon')->nullable()->comment('头像');
            $table->string('token')->nullable()->comment('邮箱或手机验证码');
            $table->string('weibo')->nullable();
            $table->string('wechat')->nullable();
            $table->string('github')->nullable();
            $table->string('qq')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
