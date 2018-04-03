<?php
/**
 *description         模板视图
 *FILE_NAME          framehw
 *author             周天君
 *date               2018/3/25 15:10:05
 */

namespace frames\view;


class View
{
	/**
	 * 实例化用未找到的方法自动加载静态函数
	 *
	 * @param $name
	 * @param $arguments
	 */
	public function __call ( $name , $arguments )
	{
		//p ($name);//make,调用的方法名称
		//p ($arguments);//空数组
		//(new Base())->make ();

		return self::parse ( $name , $arguments );
	}

	/**
	 * 静态调用未找到的方法自动加载静态函数
	 *
	 * @param $name
	 * @param $arguments
	 */
	public static function __callStatic ( $name , $arguments )
	{
		//p ($name);//make,调用的方法名称
		//p ($arguments);//空数组
		//	(new Base())->make ();
		return self::parse ( $name , $arguments );
	}


	/**
	 * 加载base里面的方法
	 * @param $name
	 * @param $arguments
	 *
	 * @return mixed
	 */
	private static function parse ( $name , $arguments )
	{
		//p ($name);//make,调用的方法名称
		//p ($arguments);die();//空数组
		return call_user_func_array ( [ new Base() , $name ] , $arguments );
	}
}