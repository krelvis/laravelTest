<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use SMartins\PassportMultiauth\HasMultiAuthApiTokens;
class Admin extends Authenticatable
{
    use Notifiable;
    use HasMultiAuthApiTokens;
    //
    protected $table = 'admins' ;
    protected $primaryKey = 'id';
    protected $fillable = [
        'account','password'
    ];

    /**
     * Passport认证时的默认验证数据库的email字段
     * 重写该方法修改Passport认证时的字段为username
     */
    public function findForPassport($username) {
        return $this->where('account', $username)->first();

    }

}
