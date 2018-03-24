<?php
/**
 *description
 *FILE_NAME          18-03-22-c91frame
 *author             周天君
 *date               2018/3/22 16:39:07
 */

namespace frame\core;


class Controller
{
	//声明一个私有的成员属性值，来承接跳转地址
	//方便模板页面正常调用输出
	private $url;

	////封装一个测试方法OK
	//public  function index(){
	//	echo 'frame\core controller 类里面的 index';
	//}

	/**
	 * 提示信息 message模板引入
	 * @param $msg		提示信息内容
	 */
	public function  message($msg){
		//p ($msg);//添加成功
		//加载模版文件，路径参考单一入口文件——OK
		include "./view/message.php";
	}


	/**
	 * 重定向
	 * @param $url 页面跳转地址
	 */

	public function setRedirect($url=''){
		if ($url){//如果$url有值，就把值赋值给属性$url
			$this->url=$url;
		}else{//如果$url没有值，就执行以下程序，给个默认跳转
			$this->url='javascript:history.back()';
		}
		return $this;//此处必须加return才能执行下一步add里面的链式操作
	}

}