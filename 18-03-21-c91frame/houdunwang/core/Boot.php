<?php

namespace houdunwang\core;


/**
 * 框架启动类
 * Class Boot
 *
 * @package houdunwang\core
 */
class Boot
{
	/**
	 * 执行应用
	 */
	public static function run ()
	{
		//测试代码是否正常运行到这里
		//echo 'run';
		//测试助手函数是否正常加载
		//p(1);
		//初始化框架
		self::init ();
		//执行应用类()
		self::appRun ();
	}

	/**
	 * 执行应用(application、app)
	 * 运行app/类运行
	 */
	private static function appRun ()
	{
		//在app/home/controller创建两个类协助这里进行测试
		//直接实例化类或报错：类找不见，需要配置composer配置文件
		//修改完配置文件之后执行：composer dump
		//然刷新浏览器测试即可正常
		//(new app\home\controller\IndexController())->add ();
		//(new app\home\controller\ArticleController())->index ();

		//(new app\home\controller\IndexController())->index ();
		//(new \app\admin\controller\IndexController())->index ();

		//我们会实例化不同的类，调用不同的方法，类和方法不能写死
		//通过地址栏参数的变化，控制访问不同的类，调用不同的方法
		//?m=admin&c=index&a=add (m:模块，c:控制器，a:方法)
		//?s=admin/index/add(我们使用该方式)
		if ( isset( $_GET[ 's' ] ) ) {
			$s = $_GET[ 's' ];
			//http://localhost/c91/frame/0321-c91frame/public/?s=admin/index/add
			//p($s);die;//admin/index/add
			//将字符串拆分成数组
			$info = explode ( '/' , $s );
			//p($info);die;
			$m = $info[ 0 ];
			$c = $info[ 1 ];
			$a = $info[ 2 ];
		} else {
			$m = 'home';
			$c = 'index';
			$a = 'index';
		}
		$controller = '\app\\' . $m . '\controller\\' . ucfirst ( $c ) . 'Controller';
		//(new $controller())->$a();
		//(new \app\admin\controller\IndexController())->index ();
		call_user_func_array ( [ new $controller , $a ] , [] );
	}


	/**
	 * 初始化
	 * 头部声明、时区设置、开启session等
	 */
	private static function init ()
	{
		//echo 1111;
		//头部
		header ( 'Content-type:text/html;charset=utf8' );
		//设置时区
		date_default_timezone_set ( 'PRC' );
		//开启session(如果有session_id()，说明已开启session，没有session_id，再开启session)
		session_id () || session_start ();
	}
}