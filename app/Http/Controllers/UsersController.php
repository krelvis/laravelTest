<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{
    //
    //
    public function show(User $user){

        if($user->id == null){
            //分页显示所有用户数据 pageinate(10) 每页10条数据
            $data = $user->paginate(10);
            return $data;
        }else{
            return $user;
        }
    }

    public function register(Request $request){
        //使用Traits的类进行表单验证，验证规则都放在config中的validation.php
        $validator = $this->verify($request, 'user.register');
        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = $request->only('account','nickname','username','password','email','phone','qq');
        $data['password'] = bcrypt($data['password']);
//        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        User::create($data);
        return responseSuccess('', '注册成功' );
    }
    public function Login(Request $request){
        //使用Traits的类进行表单验证，验证规则都放在config中的validation.php
        $validator = $this->verify($request, 'user.login');
        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = $request->only('username','password');
        $user = User::where('username', $data['username'])->firstOrFail();
        if (!password_verify($data['password'], $user->password)) {
            return responseWrong('登录失败，账号名或者密码错误！');

        }
        //return $this->proxy($data['username'],$data['password']);
        //return responseSuccess('', '登录成功' );


    }
}
