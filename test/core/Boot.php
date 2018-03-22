<?php
/**
 *FILE_NAME          Boot.php
 *author             周天君
 *date               2018/3/21 16:11:14
 */

namespace test\core;


use app\home\controller\ArticleController;
use app\home\controller\IndexController;

class Boot
{
	/**
	 * 1、执行应用
	 */
	public static function run ()
	{
		//echo '我是测试';//正常引入OK
		//p('助手函数正常加载');//测试OK
		//静态调用初始化框架
		self::init ();
		//执行应用类
		self::appRun();
	}

	/**
	 * 2、初始化
	 * 开启头部，时区， 开启session;
	 */
	private static function init ()
	{
		//echo '我是init初始化方法';//测试加载OK
		//头部
		header ('Content-type:text/html;charset=utf8');
		//时区
		date_default_timezone_set ('PRC');
		//开启session;
		session_id ()||session_start ();
	}

	/**
	 * 3、执行应用（app）
	 */
	private static function appRun(){
	//引入外部类进行测试测试
		//	(new IndexController())->index();//测试OK
		//	(new IndexController())->edit();//测试OK
		//	(new ArticleController())->add();//测试OK
		//	(new ArticleController())->edit();//测试OK
	//	(new \app\admin\controller\IndexController())->index();//测试OK


	//  需要执行变动的类和方法，不能写死了，通过地址栏get参数构造变量，来实现不同的访问
	//	?m=admin&c=index&a=add(a表示方法名，c表示控制器，m表示模块)
		//	http://localhost:8080/zxy_frame/public/index.php?m=admin&c=index&a=add
		//	p ($_GET['m']);//admin
	//	?s=admin/index/add ;//(使用这种方式)
		//	http://localhost:8080/zxy_frame/public/index.php?s=admin/index/add
		//	p ($_GET['s']);//  admin/index/add

		//	参考以下两个调用方式，进行拼接构造变动的类和方法
		//(new \app\admin\controller\IndexController())->index();
		//(new \app\home\controller\IndexController())->edit();
		if (isset($_GET['s'])){

		$info=explode ('/',$_GET['s']);//转化为数组，一共三个数组元素
		//p ($info);//  [0] => admin 模块 [1] =>index控制器  [2] => add方法
		//p ($m=$info[0]);//admin 模块
		//p ($c=$info[1]);//index控制器
		//p ($a=$info[2]);//add方法


		$m=$info[0];
		$c=$info[1];
		$a=$info[2];
		}else{
			$m='home';//模块
			$c='index';//控制器
			$a='index';//方法
		}


		//拼接类名
		$controller='\app\\'.$m.'\controller\\'.ucwords ($c).'Controller';
		//p ($controller);//\app\admin\controller\IndexController

		//实例化调用动态类方法
		//(new $controller())->$a();
		//此种方式为系统方式，调用更快
		call_user_func_array ([new $controller,$a],[]);
	}
}