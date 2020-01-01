<?php

return [
    'user' => [
        'register' => [
            'account' => [
                'name' => '用户名',
                'rules' => 'required|min:5|max:14|unique:users',
                'message' => ['required' => '用户名不能为空', 'min' => '用户名最少为5位', 'max' => '用户名最多为14位', 'unique' => '该用户名已存在']
            ],
            'password' => [
                'name' => '注册密码',
                'rules' => 'required|min:6|max:12|unique:users',
                'message' => ['min' => '密码最少为6位', 'max' => '密码最多为12位']
            ],
            'nickname' => [
                'name' => '昵称',
                'rules' => 'required|min:2|max:14|unique:users',
                'message' => ['required' => '昵称为空', 'min' => '昵称最少为2位', 'max' => '昵称最多为14位', 'unique' => '该昵称已存在']
            ],
            'username' => [
                'name' => '姓名',
                'rules' => '',
                'message' => ['required' => '姓名为空']
            ],
            'phone' => [
                'name' => '手机号码',
                'rules' => 'required|regex:/^1[34578]\d{9}$/|unique:users',
                'message' => ['required' => '请填写 手机号码', 'regex' => '请填写 正确的手机号码']
            ],
            'email' => [
                'name' => '邮箱',
                'rules' => 'required|email|max:255|unique:users',
                'message' => ['unique' => '邮箱已使用', 'email' => '邮箱格式不正确']
            ],
            'qq' => [
                'name' => '联系QQ',
                'rules' => 'required|numeric|min:5|unique:users',
                'message' => ['numeric' => 'QQ号码不正确', 'min' => 'QQ号码最少为5位',]
            ],

        ],
        'login' => [
            'account' => [
                'name' => '用户名',
                'rules' => 'required',
                'message' => ['required' => '用户名不能为空']
            ],
            'password' => [
                'name' => '注册密码',
                'rules' => 'required',
                'message' => ['required' => '密码不能为空']
            ],
        ],
        'update_password' => [
            'old_password' => [
                'name' => '原密码',
                'rules' => 'required|min:6',
                'message' => []
            ],
            'password' => [
                'name' => '新密码',
                'rules' => 'required|min:6|confirmed',
                'message' => ['confirmed' => '两次密码输入不一致']
            ],
        ]
    ],
    'admin' => [
        'register' => [
            'account' => [
                'name' => '用户名',
                'rules' => 'required|min:5|max:14|unique:admins',
                'message' => ['required' => '用户名不能为空', 'min' => '用户名最少为5位', 'max' => '用户名最多为14位', 'unique' => '该用户名已存在']
            ],
            'password' => [
                'name' => '注册密码',
                'rules' => 'required|min:6|max:12|unique:admins',
                'message' => ['min' => '密码最少为6位', 'max' => '密码最多为12位']
            ],

        ],
        'login' => [
            'username' => [
                'name' => '用户名',
                'rules' => 'required',
                'message' => ['required' => '用户名不能为空']
            ],
            'password' => [
                'name' => '注册密码',
                'rules' => 'required',
                'message' => ['required' => '密码不能为空']
            ],
        ],
        'update_password' => [
            'old_password' => [
                'name' => '原密码',
                'rules' => 'required|min:6',
                'message' => []
            ],
            'password' => [
                'name' => '新密码',
                'rules' => 'required|min:6|confirmed',
                'message' => ['confirmed' => '两次密码输入不一致']
            ],
        ]
    ]
];