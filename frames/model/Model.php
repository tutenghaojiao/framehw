<?php
/**
 *description
 *FILE_NAME          framehw
 *author             周天君
 *date               2018/3/25 19:19:36
 */

namespace frames\model;


class Model
{
	public function __call ( $name , $arguments )
	{
		return self::parse ( $name , $arguments );

	}

	public static function __callStatic ( $name , $arguments )
	{
		return self::parse ( $name , $arguments );
	}

	private static function parse ( $name , $arguments )
	{
		$ClassName=get_called_class ();
		return	call_user_func_array ([new Base($ClassName),$name],$arguments);
	}

}