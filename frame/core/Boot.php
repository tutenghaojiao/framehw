<?php
/**
 *description
 *FILE_NAME          18-03-22-c91frame
 *author             周天君
 *date               2018/3/22 15:03:55
 */

namespace frame\core;


use app\home\controller\ArticleController;
use app\home\controller\IndexController;

class Boot
{
public static function run(){

	//错误提示
	self::handler ();
	//echo'我是框架类中的index方法';//测试OK
	//p ('我是测试,系统函数是否正常加载的');//OK
	self::init ();
	self::appRun ();
}

	/**
	 * 错误信息提示
	 */
private static function handler(){
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
}

private static function  init(){
	//echo '我是框架类中的初始化方法init';//OK
	//echo c ('database.header');
	header (c ('database.header'));//头部
	date_default_timezone_set (c ('database.timezone'));//设置时区
	session_id ()||session_start ();//开启会话控制session
}

private static function appRun(){
	//echo '我是框架类中的执行应用方法appRun';//OK
	//(new IndexController())->index();//OK
	//(new \app\home\controller\ArticleController())->edit ();//OK
	//(new \app\admin\controller\IndexController())->add ();//OK
	//(new \app\admin\controller\ArticleController())->edit ();//OK

	//?s=admin/index/add  //地址栏传参实现变动调用


	if (isset($_GET['s'])){


		$res=$_GET['s'];//admin/index/add
		//p($res);

		$info=explode ('/',$res);
		//p($info);

		$m=$info[0];
		$c=$info[1];
		$a=$info[2];
	}else{
		$m='home';
		$c='index';
		$a='index';
	}

	//声明常量，为核心资源（框架）frame里面view  Base.php服务
	define ('MODULE',$m);//模组目录
	define ('CONTROLLER',strtolower ($c));//不同的模组目录,小写
	define ('ACTION',$a);//模板文件名称

		//拼接类名
		$controller='\app\\'.$m.'\controller\\'.ucwords ($c).'Controller';
		//p ($controller);//\app\admin\controller\IndexController

	//echo (new Base());//测试输出base类中的__toString()
	//测试当输出一个对象的时候自动执行Base里面的__tostring函数	OK
	//(new $controller())->$a();
	 echo call_user_func_array ([new $controller,$a],[]);

}

}