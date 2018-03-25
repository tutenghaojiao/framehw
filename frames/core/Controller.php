<?php
/**
 *description
 *FILE_NAME          framehw
 *author             周天君
 *date               2018/3/25 13:57:17
 */

namespace frames\core;


class Controller
{
	private $url;//跳转地址
	//正常连接到这个类
//public function ceshi(){
//	echo '我是frames\core Controller测试方法ceshi';
//}

	/**
	 * 加载信息模板
	 * @param $msg 标题信息
	 */

		public function message($msg){
			//p($msg);
		//引入模版参考单一入口文件
		include "./view/message.php";
	}
	public function welcome($msg=''){
			//p($msg);
		//引入模版参考单一入口文件
		include "./view/welcome.php";
	}

	/**
	 * 设置重定向
	 */
	public function reDrict($url=''){
			if ($url){
				 $this->url=$url;
			}else{
				 $this->url= 'javascript:history.back();';
			}
			return $this;
	}

}