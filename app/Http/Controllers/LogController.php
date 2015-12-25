<?php // -*-coding:utf-8; mode:php-mode;-*-

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as AppBaseController;

class LogController extends AppBaseController
{

    /*
     * 用户操作日志显示
     */
    public function main()
	{
        // 搜索条件
        $q = empty($_GET["q"]) ? "" : $_GET["q"];
        // 分页信息
        $paging = array("c"=>(empty($_GET["c"]) || !is_numeric($_GET["c"]) || $_GET["c"]<1)  ? "1" : $_GET["c"], "limit"=>30, "tatal"=>1000);
        // 输出操作日志
        return view('log_main', ["q"=>$q, "paging"=>$paging]);
	}
}
