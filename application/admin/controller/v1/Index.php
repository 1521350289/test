<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-11-17
 * Time: 下午 1:08
 */

namespace app\admin\controller\v1;


use app\admin\controller\BaseController;
use app\lib\exception\ParameterException;
use app\validate\Login;
use think\captcha\Captcha;
use app\admin\service\Login as LoginService;
use app\admin\model\User as UserModel;

class Index extends BaseController
{
    public function index()
    {
        return $this->fetch('../view/index');
    }

    public function login($username,$password,$code)
    {
        (new Login())->goCheck();
        $captchaCheck = LoginService::CheckCaptcha($code);
        /*if (!$captchaCheck){
            throw new ParameterException([
                'code'=>400,
                'msg'=>'验证码错误!',
                'errorCode'=>999
            ]);
        }*/
        $check = UserModel::getByUsername($username,$password);
        if (!$check){
            echo '用户名错了';die;
        }
        return [
            'code'=>200,
            'msg'=>'登录成功',
            'errorCode'=>0
        ];
    }

    public function captcha()
    {
        $config = [
            // 验证码字体大小
            'fontSize' => 30,
            // 验证码位数
            'length' => 4,
            // 关闭验证码杂点
            'useNoise' => true,
            // 验证码图片高度
            'imageH'   => 36,
            // 验证码图片宽度
            'imageW'   => 116,
            // 验证码过期时间（s）
            'expire'   => 1800,
        ];
        $captcha = new Captcha($config);
        return $captcha->entry();
    }
}