<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
class AdminsController extends Controller
{
    //
    public function username()
    {
        return 'account';
    }
    public function show(Admin $admin){

        if($admin->id == null){
            //分页显示所有用户数据 pageinate(10) 每页10条数据
            $data = $admin->paginate(10);
            return $data;
        }else{
            return $admin;
        }
    }
    public function register(){
//        //使用Traits的类进行表单验证，验证规则都放在config中的validation.php
        $validator = $this->verify(request(), 'admin.register');
        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = request()->only('account','password');
        $data['password'] = bcrypt($data['password']);
        Admin::create($data);
        $tokenData = $this->getTokenData(request('account'),request('password'),'admins');
        return responseSuccess($tokenData, '注册成功' );

    }

    public function Login(){
        //使用Traits的类进行表单验证，验证规则都放在config中的validation.php
        $validator = $this->verify(request(), 'user.login');
        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = request()->only('account','password');

        $user = Admin::where('account', $data['account'])->firstOrFail();
        if (!password_verify($data['password'], $user->password)) {
            return responseWrong('登录失败，账号名或者密码错误！');
        }
        $tokenData = $this->getTokenData($data['account'],$data['password'],'admins');
        return responseSuccess($tokenData, '登录成功' );
    }
}
