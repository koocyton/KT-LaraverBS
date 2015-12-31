<?php // -*-coding:utf-8; mode:php-mode;-*-

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller as AppBaseController;

class LogController extends AppBaseController
{
    /*
     * 用户操作日志显示
     */
    public function main()
	{
        // 分页从第几个开始算，第一个是 1 , 而不是 0
        $c = empty($_GET["c"]) ? "1" : $_GET["c"];
        // 搜索条件
        $q = empty($_GET["q"]) ? "" : $_GET["q"];
        // 分页信息
        $paging = array("c"=>(empty($_GET["c"]) || !is_numeric($_GET["c"]) || $_GET["c"]<1)  ? "1" : $_GET["c"], "limit"=>30, "total"=>DB::table('log')->count());
        // 数据
        $logs = DB::table('log')->orderBy('id','desc')->skip($c-1)->take(30)->get();
        // 输出操作日志
        return view('log_main', ["q"=>$q, "paging"=>$paging, "logs"=>$logs]);
	}
}
