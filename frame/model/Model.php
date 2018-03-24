<?php
/**
 *description         实现自动加载功能文件（属于一个中间文件）
 *FILE_NAME          18-03-22-c91frame
 *author             周天君
 *date               2018/3/22 23:54:32
 */

namespace frame\model;


class Model
{
	/**
	 *
	 * @param $name
	 * @param $arguments
	 * @return mixed
	 */
	public function __call ( $name , $arguments )
	{
	  return	self::runPares ($name , $arguments);
	}



	/**
	 *
	 * @param $name
	 * @param $arguments
	 * @return mixed
	 */

	public static function __callStatic ( $name , $arguments )
	{
		return	self::runPares ($name , $arguments);
	}


	/**
	 *
	 * @param $name
	 * @param $arguments
	 */
	private static function runPares ( $name , $arguments )
	{

		//??????????????
		$modelClass=get_called_class ();
		//p(get_called_class ());//system\model\Stu
		return	call_user_func_array ( [ new Base($modelClass) , $name ] , $arguments );
	}

}