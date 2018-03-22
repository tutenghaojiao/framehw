<?php
namespace houdunwang\view;

class Base{

	private $file;//模板文件
	private $data = [];//存储数据
	/**
	 * 加载模板
	 */
	public  function make($tpl = ''){
		//echo 'make';
		//include './view/welcome.php';
		//$this->file = './view/welcome.php';
		//p(MODULE);
		//p(CONTROLLER);
		//p(ACTION);
		$tpl = $tpl ? : ACTION;
		$this->file = '../app/'.MODULE.'/view/'.CONTROLLER.'/'.$tpl.'.php';
		return $this;
	}

	/**
	 * 分配变量
	 */
	public function with($var = []){
		//echo 'with';
		//p($var);die;
		//extract ($var);
		//p($test);
		//p($hd);
		$this->data = $var;
		//返回给View里面的runParse方法
		return $this;
	}

	/**
	 * 当输出一个对象的时候运行
	 * @return string
	 */
	public function __toString ()
	{
		//echo 1;die;
		extract ($this->data);
		if(!is_null ($this->file)){
			include $this->file;
		}
		return '';
	}

}