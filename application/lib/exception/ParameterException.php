<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-11-19
 * Time: 下午 12:05
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}