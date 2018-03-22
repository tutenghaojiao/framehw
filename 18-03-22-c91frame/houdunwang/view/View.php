<?php
namespace houdunwang\view;

class View
{
	/**
	 * 当调用(在app\home\controller\IndexController()->index()进行的测试)一个不存在的方法时候自动触发
	 * @param $name			找不到的方法名
	 * @param $arguments	该方法的参数
	 */
	public function __call ( $name , $arguments )
	{
		self::runParse ($name,$arguments);
	}

	/**
	 * 当静态调用(在app\home\controller\IndexController()->index()进行的测试)一个不存在的方法时候自动触发
	 * @param $name			找不到的方法名
	 * @param $arguments	该方法的参数
	 */
	public static function __callStatic ( $name , $arguments )
	{
		//echo 2;die;
		//p($name);//make
		//p($arguments);die;
		return self::runParse ($name,$arguments);
		//return  234;
	}

	/**
	 * 就是为了实例化base调用对应的方法
	 * @param $name			方法名
	 * @param $arguments	参数
	 */
	private static function runParse($name,$arguments){
		//echo 111;die;
		//p($arguments);
		//接受Base中$name(with/make)返回值
		return call_user_func_array ([new Base(),$name],$arguments);
	}
}