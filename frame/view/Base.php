<?php
/**
 *description
 *FILE_NAME          18-03-22-c91frame
 *author             周天君
 *date               2018/3/22 19:23:51
 */

namespace frame\view;


class Base
{
	private static $files;//模版文件
	private static $data=[];//存储数据

	/**
	 * 加载模板
	 * @param $spl
	 */
public function make($spl=''){
	//p ($spl);//空字符串,当传参数的时候就代表一个文件的名称 例如welcome
	//echo '我是测试frame view view.php里面View 类自动加载方法是否正常的';//OK
	//	include "./view/welcome.php";//成功加载OK
	//self::$files='./view/welcome.php';

	//构造模板文件路径;需要借助核心资源文件里面的地址栏参数来操作
	//	默认连接的文件
	//	p (MODULE);//home
	//	p (CONTROLLER);//index
	//	p (ACTION);//index

	$spl=$spl? :ACTION;//如果传了参数,就按照传参数执行,如果没有传参数就按照默认值来执行
	self::$files='../app/'.MODULE.'/view/'.CONTROLLER.'/'.$spl.'.'.c('view.suffix');
	//p (self::$files);//  ../app/home/view/index/index.php
	//include "../app/home/view/index/welcome.php";//测试能正常加载
	return $this;
}


/**
 * 分配变量
 */
public function  with($var=[]){
	//echo '我是frame\view里面base.php文件里面的with方法';//OK
	//p ($var);//空数组;传参数时候为一个数组
	extract ($var);//数据还原
	//p ($test);//接收的变量OK
	//p($tst);//接收的数组OK——变量值变红色

	//把数据存储起来到一个变量里面方便输出和调用
	self::$data=$var;
	//返回给View里面的runParse方法
	return $this;
}

	/**
	 * 当输出一个对象的时候自动执行的函数，必须要return
	 * @return string
	 */
public function __toString ()
{
	//echo '我是输出一个对象的时候自动执行的函数';//测试


	extract (self::$data);
	//p (self::$data);

	//触发此函数的时候，页面和数据都已经正常加载了;
	if (!is_null (self::$files)){
		include self::$files ;
	}
	return'';
}


}