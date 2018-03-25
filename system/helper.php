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
 * 加载配置项文件的c(config)函数
 * @param null $var		配置项
 *
 * @return array|mixed|null
 */
function c ( $var = null )
{
	if(is_null ($var)){
		//说明调用(c())，加载所有的配置项数据
		//[
		//	'database'=>[
		//		'db_name'=>'',
		//		'db_user'=>'',
		//	],
		//	'view'=>[
		//		'houzhui'=>'php'
		//	],
		//];
		//将cofig目录里面文件扫描出来
		$files = glob ('../system/config/*');
		//p($files);
		//声明一个空数组，用来存储最后的处理结果
		$data = [];
		foreach ($files as $file){
			//include加载文件内容
			$content = include $file;
			//p($content);
			//以下三行代码为了将文件名(不带后缀)截取出来，为了作为数组下标
				$fileName = basename ($file);//获取文件名：database.php
				$position = strpos ($fileName,'.php');//获取.php位置：8
				$index  = substr ($fileName,0,$position);//字符串截取：database
			$data[$index] = $content;
		}
		//p($data);
		return $data;
	}
	//将var按照.拆分成数组
	$info = explode ('.',$var);
	//p($info);
	if(count ($info)==1){
		//说明调用(c('database'))，加载database所有的配置项数据
		$file = '../system/config/'.$var.'.php';
		return is_file ($file)? include $file : null ;
	}
	if(count ($info)==2){
		//说明调用(c('database.name'))，加载database里的name这一项的值
		$file = '../system/config/'.$info[0].'.php';
		if(is_file ($file)){
			$data = include $file;
			return isset($data[$info[1]]) ? $data[$info[1]] : null;
		}else{
			return null;
		}
	}
}
