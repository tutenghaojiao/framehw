<?php
/**
 * 打印函数
 *
 * @param $var    打印的变量
 */
function p ( $var )
{
	echo '<pre style="width: 100%;padding: 5px;background: #CCCCCC;border-radius: 5px">';
	if ( is_bool ( $var ) || is_null ( $var ) ) {
		var_dump ( $var );
	} else {
		print_r ( $var );
	}
	echo '</pre>';
}

/**
 * 定义常量:IS_POST
 * 将侧是否为post请求
 */
define ( 'IS_POST' , $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ? true : false );


/**
 * 加载配置项函数
 */
function c($var=null){
//p (is_null ($var));//bool(true)
	//说明没有传参数执行第一个if体;实现的功能是加载所有的配置项数据并且把结果返回回去
	if (is_null ($var)){

		$files=glob ('../system/config/*');
		//p ($files);die();//获得数组,元素是两个配置文件的完整路径
		$data=[];//声明一个空数组来接配置项里面的所有数据

		foreach ( $files as $file ) {
			//p ($file);//数组元素（文件完整路径）
			$content= include $file;
			//p ($content);//正常加载两个配置项里面的数据
			//把文件名称作为数组下标
			$fileName=basename ($file);//获取文件名称
			//p ($fileName);//database.php view.php
			$positon=strrpos ($fileName,'.php');
			//p($positon);//8  4
			$index=substr ($fileName,0,$positon);
			//p($index);//database  view
			$data[$index]=$content;
		}
		//p ($data);
		return $data;
	}


	$info=explode ('.',$var);//把参数按照.拆分成数组
	//p ($info);
	if (count ($info)==1){
			//加载配置项文件
		$file='../system/config/'.$info[0].'.php';
		//p ($file);//../system/config/database.php
		$data=is_file ($file)?include $file:null;
		//p ($data);
		return $data;
	}


	if (count ($info)==2){
		//p ($info);die();
		$file='../system/config/'.$info[0].'.php';
		//p ($file);die();
		//p ($info[1]);die();
		if (is_file ($file)){//是个文件就加载他，并且找到这个文件中跟第二个参数对应的元素值，返回他
			$data=include $file;
			//p ($data);
			return isset($data[$info[1]])?$data[$info[1]]:null;
		}else{//否则就返回空值
			return null;
		}

	}
}
