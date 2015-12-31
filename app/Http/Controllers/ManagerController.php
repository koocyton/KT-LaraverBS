<?php // -*-coding:utf-8; mode:php-mode;-*-

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Http\Controllers\Controller as AppBaseController;
use App\Http\Middleware\KTAnchor;

class ManagerController extends AppBaseController
{
    /*
     * 主界面
     */
    public function main()
	{
        // 搜索条件
        $q = empty($_GET["q"]) ? "" : $_GET["q"];
        // 分页从第几个开始算，第一个是 1 , 而不是 0
        $c = empty($_GET["c"]) ? "1" : $_GET["c"];
        // 管理员列表
        $managers = DB::table('users')->orderBy('id','desc')->skip($c-1)->take(30)->get();
        // 分页信息
        $paging = array("c"=>$c, "limit"=>30, "tatal"=>DB::table('users')->count());
        // 渲染界面
        return view('manager_main', ["q"=>$q, "managers"=>$managers, "paging"=>$paging]);
	}

    /*
     * 增加管理员
     */
    public function create()
	{
        // 管理员
        $manager = DB::table('users')->where('email', $_POST["email"])->first();
        if (!empty($manager)) {
            return $this->showSlidMessage('错误：邮箱已经存在，请使用其他邮箱');
        }
        // 保存
        DB::table('users')->insertGetId(array('email'=>$_POST["email"], 'password'=>Hash::make($_POST["password"]), 'created_at'=>date("Y-m-d H:i:s")));
        // 刷新主界面
        return KTAnchor::flushLocation();
    }

    /*
     * 编辑管理员
     */
    public function edit($id)
	{
        // 管理员
        $manager = DB::table('users')->where('id', $id)->first();
        // 设定权限
        $privileges = explode(",", $manager->privileges);
        // 设定 checked
        $privileges_checked = array();
        foreach($privileges as $privilege) {
            $privileges_checked[$privilege] = "checked";
        }
        // 渲染界面
        return view('manager_edit', ["manager"=>$manager, "privileges_checked"=>$privileges_checked]);
    }

    /*
     * 跟新管理员密码
     */
    public function update($id)
	{
        if (!empty($_POST["password"]) && $_POST["password"]!="********")
        {
            $password = Hash::make($_POST["password"]);
            DB::table('users')->where('id', $id)->update(array('password' => $password));
        }
        if (!empty($_POST["limits"]))
        {
            $privileges = implode(",", $_POST["limits"]);
            DB::table('users')->where('id', $id)->update(array('privileges' => $privileges));
        }
        // 渲染界面
        return KTAnchor::flushLocation("更新完毕");
    }

    /*
     * 删除管理员
     */
    public function delete($id)
	{
    }
}
