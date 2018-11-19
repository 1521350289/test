<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-11-19
 * Time: 下午 1:34
 */

namespace app\validate;


class Login extends BaseValidate
{
    protected $rule = [
        'username' => 'require|isNotEmpty',
        'password' => 'require|isNotEmpty',
        'code' => 'require|isNotEmpty'
    ];

    protected $message = [
        'code' => '验证失败'
    ];
}