<?php
namespace houdunwang\core;

class Controller
{
	private $url;
	//测试完之后就不需要了
	//public function index(){
	//	echo 'controller index';
	//}

	/**
	 * 消息提示
	 * @param $msg  消息内容
	 */
	public function message($msg){
		//加载模板文件参考单入口
		//p($msg);
		include './view/message.php';
	}

	/**
	 * 重定向(指定跳转的页面)
	 */
	public function setRedirect($url = ''){
		if($url){
			//跳转指定地址
			$this->url = $url;
		}else{
			//跳回历史记录地址
			$this->url = 'javascript:history.back();';
		}
		return $this;
	}
}