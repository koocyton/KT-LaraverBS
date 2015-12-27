<?php

namespace App\Http\Controllers;

use Auth;
use Cookie;
use App;
use Lang;
use Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
                    return;
                }
                // 如果是浏览器直接刷新的
                else {
                    return view('__portal', ["locale"=>$this->locale]);
                }
            }
            // 如果还没登录
            else {
                // 如果是 Ajax 请求
                if (Request::ajax()) {
                    return $this->showSlidMessage(Lang::get('login.Session Timeout'));
                }
                // 如果是浏览器直接刷新的
                else {
                    return $this->topLocation('/login');
                }
            }
        });
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

    // 组织分页数据
    public function getPaging($current, $limit, $total)
    {
        return array("c"=>$current, "limit"=>$limit, "tatal"=>$total);
    }

    // 弹出错误
    public function showSlidMessage($msg)
    {
        return response("<script>$.KTAnchor.showSlidMessage('".$msg."');</script>");
    }

    // 页面跳转
    public function topLocation($url)
    {
        return response("<script>window.top.location='".$url."';</script>");
    }

    // pjax 跳转
    public function pushState($url)
    {
        return response("<script>window.history.pushState(null, '', '".$url."');$(window).trigger('popstate');</script>");
    }

    // 刷新右侧
    public function flushLocation($msg="")
    {
        if (!empty($msg)) {
            return response("<script>$.KTAnchor.showSlidMessage('".$msg."');$(window).trigger('popstate');</script>");
        }
        else {
            return response("<script>$(window).trigger('popstate');</script>");
        }
    }
}
