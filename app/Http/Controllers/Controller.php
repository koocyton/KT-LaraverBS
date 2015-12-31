<?php

namespace App\Http\Controllers;

use Auth;
use Cookie;
use App;
use Lang;
use Request;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Middleware\KTAnchor;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $locale = "cn";

    public function __construct()
    {
        // 本地化设置
        $this->setLocale();
        // 权限判断
        $this->beforeFilter(function()
        {
            // 如果已经登录
            if (Auth::check()) {
                // 如果是 Ajax 请求
                if (Request::ajax()) {
                    // 记录日志
                    $this->writeActionLog();
                    // 返回空
                    // return;
                }
                // 如果是浏览器直接刷新的
                else {
                    $account = Auth::user()["attributes"]["email"];
                    return view('__portal', ["locale"=>$this->locale, "account"=>$account]);
                }
            }
            // 如果还没登录
            else {
                // 如果是 Ajax 请求
                if (Request::ajax()) {
                    return KTAnchor::showSlidMessage(Lang::get('login.Session Timeout'));
                }
                // 如果是浏览器直接刷新的
                else {
                    return KTAnchor::topLocation('/login');
                }
            }
        });
    }

    // 记录日志
    private function writeActionLog()
    {
        $user = Auth::user();
        // 忽略 request = /log ...
        if (strpos($_SERVER["REQUEST_URI"], "/log")===false)
        {
            // 记录 session 已经失效的请求
            $email = !empty($user) ? $user["attributes"]["email"] : "";
            // 记录日志
            $log = ["account"=>$email, "created_at"=>date("Y-m-d H:i:s"), "request_ip"=>$_SERVER["REMOTE_ADDR"], "request_method"=>$_SERVER["REQUEST_METHOD"],"request_action"=>$_SERVER["REQUEST_URI"]];
            // 自增 ID 的插入
            DB::table('log')->insertGetId($log);
        }
    }

    // 设置本地语言
    protected function setLocale()
    {
        // 从 Cookie 获取本地化设置
        if (!empty(Cookie::get('locale'))) {
            $this->locale = Cookie::get('locale');
        }
        // 从 Get 获取本地化设置
        if (!empty($_GET["locale"])) {
            $this->locale = $_GET["locale"];
        }
        // 修正
        $this->locale = in_array($this->locale, ["en", "jp", "kr", "tw" , "cn"]) ? $this->locale : "cn" ;
        // 本地化设置
        App::setLocale($this->locale);
    }
}
