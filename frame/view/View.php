<?php
/**
 *description
 *FILE_NAME          18-03-22-c91frame
 *author             周天君
 *date               2018/3/22 19:23:19
 */

namespace frame\view;


class View
{

	/**
	 * 实例化调用未知方法时候触发这个函数;触发地(app\home\controller\IndexController()->index())
	 *  通过触发这个方法，来达到引用Base.php文件的目的
	 * @param $name			未找到的方法名字
	 * @param $arguments	方法参数
	 */
	public function __call ( $name , $arguments )
	{
		//echo '我是View里面的自动触发未定义的普通方法函数';//测试正常触发，OK
		//p ($name);//make 调用的未知的方法名字

		//实例化调用Base.php里面的make方法,测试成功	OK
		//(new Base())->make();
		//call_user_func_array ([new Base(),$name],[]);

		//通过内部公共方法调用base.php文件里面的方法（方便管理，节省代码）
		return	self::runParse ($name,$arguments);

	}


	/**
	 *静态调用未知的静态方法触发这个函数;触发地（app\home\controller\IndexController()->index()）;
	 * 通过触发这个方法，来达到引用Base.php文件的目的
	 * @param $name			未找到的方法名字
	 * @param $arguments	方法参数
	 */
	public static function __callStatic ( $name , $arguments )
	{
		//echo '我是View里面的自动静态触发函数';//测试正常触发，OK
		//p ($name);//make 调用的未知的方法名字
		//p ($arguments);//空数组

		//实例化调用Base.php里面的make方法,测试成功	OK
		//(new Base())->make();
		//call_user_func_array ([new Base(),$name],[]);

		//通过内部公共方法调用base.php文件里面的方法（方便管理，节省代码）
		return self::runParse ($name,$arguments);
	}


	/**
	 * 此方法为公用方法，方便以上两个方法__call和__callStatic调用
	 * 此方法连接的是base.php里面的方法
	 * @param $name
	 * @param $arguments
	 */
	private static  function runParse($name , $arguments){
		//echo '我是frame\view VIEW类中的公用方法';//测试OK，正常引用

		//p ($name);//make 调用的未知的方法名字
		//p ($arguments);//空数组

		//无用
		//测试当输出一个对象的时候自动执行Base里面的__tostring函数	OK
		//$obj=new Base();
		//echo $obj;

		//p ($arguments);//此时传参数为索引数组
		return	call_user_func_array ([new Base(),$name],$arguments);
	}
}