<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-11-19
 * Time: 下午 2:27
 */

namespace app\lib\exception;


use think\exception\Handle;
use think\Request;

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;

    public function render(\Exception $e)
    {
        if ($e instanceof BaseException){
            //自定义异常
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }else{
            if (config('app_debug')){
                //调试模式下返回父类信息
                return parent::render($e);
            }
            //此时为未定义异常且非调试模式  返回默认错误就可以了
            $this->code = 500;
            $this->msg = "服务器内部错误";
            $this->errorCode  = 999;
            //日志记录
        }
        $request = Request::instance();
        $result = [
            'code' => $this->code,
            'error_code' =>$this->errorCode,
            'request_url' => $request->url()
        ];
        return $result;
    }
}