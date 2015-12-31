<?php

namespace App\Http\Middleware;

class KTAnchor
{
    // 组织分页数据
    public static function getPaging($current, $limit, $total)
    {
        return array("c"=>$current, "limit"=>$limit, "tatal"=>$total);
    }

    // 弹出错误
    public static function showSlidMessage($msg)
    {
        return response("<script>$.KTAnchor.showSlidMessage('".$msg."');</script>");
    }

    // 页面跳转
    public static function topLocation($url)
    {
        return response("<script>window.top.location='".$url."';</script>");
    }

    // pjax 跳转
    public static function pushState($url)
    {
        return response("<script>window.history.pushState(null, '', '".$url."');$(window).trigger('popstate');</script>");
    }

    // 刷新右侧
    public static function flushLocation($msg="")
    {
        if (!empty($msg)) {
            return response("<script>$.KTAnchor.showSlidMessage('".$msg."');$(window).trigger('popstate');</script>");
        }
        else {
            return response("<script>$(window).trigger('popstate');</script>");
        }
    }
}
