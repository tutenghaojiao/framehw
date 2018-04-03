<?php
/**
 *description
 *FILE_NAME          framehw
 *author             周天君
 *date               2018/3/25 9:51:42
 */

namespace frames\core;


use app\home\controller\ArticleController;
use app\home\controller\IndexController;

class Boot
{
	/**
	 *执行应用类
	 */
public static  function run(){
	//错误提示
	self::handler ();
	//echo '单一入口文件连接测试frames\core Boot中的run方法';//OK
	//p("我是助手函数里面打印函数p");//OK
	self::init ();//初始化
	//p(date ('Y-m-d H:i:s',time ()));//时区测试OK
	self::appRun();//执行应用
}

	/**
	 * 2、错误信息提示设置
	 */
	private static function handler(){
		$whoops = new \Whoops\Run;
		$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
		$whoops->register();
	}

	/**
	 * 初始化
	 */
private static function init(){
	header (c ('database.header'));//表头
	date_default_timezone_set (c ('database.timezone'));//时区
	session_id ()||session_start ();//开启会话控制session
}

	/**
	 * 执行应用
	 */
private static function appRun(){
	//(new IndexController())->index ();
	//(new \app\home\controller\IndexController())->index();
	//(new IndexController())->add  ();
	//(new \app\home\controller\IndexController())->add();
	//(new ArticleController())->index ();
	//(new \app\home\controller\ArticleController())->index();
	//(new ArticleController())->edit();
	//(new \app\home\controller\ArticleController())->edit();
	//(new \app\admin\controller\IndexController())->index ();
	//(new \app\admin\controller\ArticleController())->index ();
if (isset($_GET['s'])){
	//由上面的调用可以看出,我们要调用不同的类和方法就不能把类方法写死了
	//构造变动的类和方法(地址栏传参数)
	//?s=home/index/index
	$res=$_GET['s'];
	//p ($res);//home/index/index
	$info=explode ('/',$res);
	//p ($info);
	$m=$info[0];//home,模块目录名
	$c=ucfirst ($info[1]);//Index,类名
	$a=$info[2];//index,方法名
}else{//默认加载模板
	$m='home';
	$c='index';
	$a='index';
}

//此处声明常量为加载模板用
define ('MODLE',$m);
define ('CONTROLLER',strtolower ($c));
define ('ACTION',$a);

	//拼接类名
	$conctroller='\app\\'.$m.'\controller\\'.$c.'Controller';
	//p ($conctroller);//\app\home\controller\IndexController
	//实例化调用一个方法，
	//(new $conctroller())->$a();
   echo call_user_func_array ([new $conctroller(),$a],[]);

}

}