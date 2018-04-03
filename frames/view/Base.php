<?php
/**
 *description
 *FILE_NAME          framehw
 *author             周天君
 *date               2018/3/25 15:09:50
 */

namespace frames\view;


class Base
{
	private static $files;//模板文件
	private static $data=[];//数据加载
	/**
	 * 加载模板
	 * @param string $tpl  模板文件名称
	 */
public function make($tpl=''){

		//echo 'frames\view frames\view make加载模板';//OK
		//include "./view/welcome.php";die();//OK 加载成功
		//self::$files=include "./view/welcome.php";
		//p ($tpl);die();//文件名

	//拼装模板文件路径
		//p (MODLE);
		//p (CONTROLLER);
		//p (ACTION);
		//p (is_bool($tpl));//bool(false)
		$tpl=$tpl? :ACTION;
		//p($tpl);
	self::$files='../app/'.MODLE.'/view/'.CONTROLLER.'/'.$tpl.'.'.c ('view.suffix');
		//p (self::$files);
		//include self::$files;//加载模板
		//./app/home/view/article/index.php
		//./app/home/view/index/index.php
		//./app/admin/view/index/index.php
	return $this;
}

/**
 * 分配变量
 */
public function with($para=[]){

	//echo '测试是否连接';//OK
	//p ($para);die();//关联数组
	extract ($para);//2条数据被处理
	//p ($data);die();
	//p ($test);
	self::$data=$para;
	return $this;
}

/**
 * 输出一个对象时候运行
 * 必须要return
 */
public function __toString ()
{

	//echo '测试';die();// app\home\controller\IndexController\index
	extract (self::$data);
	if (!is_null (self::$files)){
		include self::$files;
	}
	return'';
}


}