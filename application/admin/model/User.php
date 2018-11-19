<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-11-19
 * Time: 下午 4:06
 */

namespace app\admin\model;


use think\Model;

class User extends Model
{
    public static function getByUsername($username,$password)
    {
        $check = self::where('username','=',$username)
            ->where('password','=',$password)
            ->find();
        return $check;
    }
}