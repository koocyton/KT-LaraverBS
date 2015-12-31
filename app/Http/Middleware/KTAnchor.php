<?php

namespace App\Http\Middleware;

class KTAnchor
{
    // 组织分页数据
    public static function getPaging($paging_symbol, $limit, $total)
    {
        // 检查是否合法
        $current = (empty($_GET[$paging_symbol]) || !is_numeric($_GET[$paging_symbol]) || $_GET[$paging_symbol]<0) ? 1 : $_GET[$paging_symbol];
        // 返回分页的信息
        return array("current"=>$current, "limit"=>$limit, "total"=>$total);
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
