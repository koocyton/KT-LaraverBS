<?php // -*-coding:utf-8; mode:php-mode;-*-

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller as AppBaseController;
use App\Http\Middleware\KTAnchor;

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
        $paging = KTAnchor::getPaging("c", 30, DB::table('log')->count());
        // 数据
        $logs = DB::table('log')->orderBy('id','desc')->skip($paging["current"]-1)->take(30)->get();
        // 输出操作日志
        return view('log_main', ["q"=>$q, "paging"=>$paging, "logs"=>$logs]);
	}
}
