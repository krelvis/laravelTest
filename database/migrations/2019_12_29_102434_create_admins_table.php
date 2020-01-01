<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account')->nullable()->default('')->unique()->comment('账号');
            $table->string('password')->nullable()->default('')->comment('密码');
            $table->tinyInteger('role_id')->default(0)->comment('角色 id0 游客');
            $table->string('token')->nullable()->default('')->comment('令牌');
            $table->string('remark')->default('')->comment('备注');
            $table->string('register_ip')->nullable()->comment('注册IP');
            $table->string('last_login_ip')->nullable()->comment('最后登录ip');
            $table->timestamp('last_login_at')->nullable()->comment('最后登录时间');
            $table->softDeletes();
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
        Schema::dropIfExists('admins');
    }
}
