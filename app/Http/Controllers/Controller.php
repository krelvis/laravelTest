<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\ProxyTrait;
use App\Traits\ValidationTrait;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //引入自定义模拟HTTP发送请求的Trait类
    use ProxyTrait;
    //引入自定义表单验证的Trait类
    use ValidationTrait;


}
