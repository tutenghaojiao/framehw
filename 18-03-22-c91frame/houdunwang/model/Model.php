<?php

namespace houdunwang\model;

class Model
{

	public function __call ( $name , $arguments )
	{
		return self::runParse ( $name , $arguments );
	}

	public static function __callStatic ( $name , $arguments )
	{
		return self::runParse ( $name , $arguments );
	}

	private static function runParse ( $name , $arguments )
	{
		return call_user_func_array ( [ new Base() , $name ] , $arguments );
	}
}