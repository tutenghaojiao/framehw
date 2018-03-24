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
 * 加载配置项文件函数c（config);
 *
 */

function c ( $var = null )
{
	//当未传参数时候默认走这个if语句
	//加载所有配置项文件数据
	if ( is_null ( $var ) ) {
		//执行加载所有的配置项数据
		$files = glob ( '../system/config/*' );//扫描配置项文件目录里面的所有文件
		//p ($files);//得到的是一个数组里面有两个元素，分别是两个文件的完整路径包含文件名字

		//声明一个空数组来储存最后的处理结果
		$data = [];
		//循环$files
		foreach ( $files as $file ) {
			//p ($file);//得到数组里面的每一个元素值（相当于一个文件路径）

			//加载文件内容
			$content = include $file;
			//p($content);//获得两个配置项文件里面的数据信息

			//截取文件名（不含后缀名），作为数组下标
			$filename = basename ( $file );
			//p ($filename);//获得文件名database.php  view.php
			$position = strpos ( $filename , '.php' );
			//p ($position);//获得文件名后缀出现的位置8，4
			$index = substr ( $filename , 0 , $position );
			//p($index);//获得配置文件名，不含后缀（database,view）

			$data[ $index ] = $content;//把处理好的配置项数据追给$data数组
		}

		//p ($data);//得到两个配置项里面的所有数据（都集中在一个数组中）

		return $data;//把处理好的配置项数据给返出去（谁调用就返给谁）;
	}


	//将参数$var按照.拆分成数组
	$info = explode ( '.' , $var );
	//p ($info);//把传来的参数转换成一个索引数组，可以通过元素个数作为下面两个if体做判断条件


	//当传了一个参数（$info数组元素个数为1）的时候，默认走这个if语句
	//加载的是当前调用的配置项文件里面的数据
	if ( count ( $info ) == 1 ) {
		$file = '../system/config/' . $var . '.php';

		//p ($file);//获得的是整个配置项文件../system/config/database.php
		return is_file ( $file ) ? include $file : null;//加载配置文件
	}


	//当传了两个参数（$info数组元素个数为2）的时候，默认走这个if语句
	//加载得是一个配置项里面得具体一个值
	if ( count ( $info ) == 2 ) {
		$file = '../system/config/' . $info[ 0 ] . '.php';
		if ( is_file ( $file ) ) {
			$data = include $file;//加载配置文件
			//p ($data);//整个配置文件里面得数据
			return isset( $data[ $info[ 1 ] ] ) ? $data[ $info[ 1 ] ] : null;//返回配置文件里面设定得元素值
		} else {
			return null;
		}

	}


}


