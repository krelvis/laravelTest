<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use SMartins\PassportMultiauth\HasMultiAuthApiTokens;
class User extends Authenticatable
{
    use Notifiable;
    use HasMultiAuthApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //$table 设置模型对于数据库表名，$primaryKey 设定该表名的主键
    //$guarded 设置不可批量填充的字段 $fillable  设置可批量修改的字段
    protected $table = 'users' ;
    protected $primaryKey = 'id';
    protected $fillable = [
        'account','password', 'nickname', 'username', 'phone', 'email', 'qq'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Passport认证时的默认验证数据库的email字段
     * 重写该方法修改Passport认证时的字段为username
     */
    public function findForPassport($username) {
        return $this->where('account', $username)->first();

    }
}
