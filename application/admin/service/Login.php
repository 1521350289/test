<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-11-19
 * Time: 下午 4:02
 */

namespace app\admin\service;


use think\captcha\Captcha;

class Login
{
    public static function checkCaptcha($code,$id = '')
    {
        $captcha = new Captcha();
        return $captcha->check($code, $id);
    }
}