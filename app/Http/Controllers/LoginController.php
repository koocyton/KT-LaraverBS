<?php // -*-coding:utf-8; mode:php-mode;-*-

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as AppBaseController;

class LoginController extends AppBaseController
{
    // 不检查登录
    public function __construct()
    {
        // 本地化设置
        $this->setLocale();
        // 不检查登录
        $this->beforeFilter(function(){});
    }

    /*
     * 登录的表单
     */
    public function form()
	{
        // 设置 Cookie
        Cookie::queue('locale', $this->locale, 36000000);
        // 设置背景图
        return view('login_form', ["locale"=>$this->locale]);
	}

    /*
     * 提交登录
     */
    public function signin()
	{
        // 是否记住
        $rember = !empty($_POST["rember"]) ? false : true;
        // 登录
        if (Auth::attempt(['email' => $_POST["account"], 'password' => $_POST["password"]], $rember))
        {
            return $this->topLocation('/manager');
        }
        else {
            return $this->showSlidMessage(Lang::get('login.Failed'));
        }
	}

    /*
     * 退出登录
     */
    public function signout()
	{
        Auth::logout();
        return $this->topLocation('/login');
	}
}
