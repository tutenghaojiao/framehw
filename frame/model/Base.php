<?php
/**
 *description
 *FILE_NAME          18-03-22-c91frame
 *author             周天君
 *date               2018/3/22 23:54:06
 */

namespace frame\model;

use PDO;

use Exception;

class Base
{
	private static $pdo   = null;//承接数据库
	private        $table;//操作的数据表
	private        $where = '';//查询条件关键字;默认给空值
	private        $order = '';//数据排序;默认给空值
	private 		$field;//指定列数据
	private 		$limit;//截取数据数量

	/**
	 * 自动加载数据库
	 * Base constructor.
	 */
	public function __construct ( $class )
	{
		//连接数据库OK
		self::connect ();

		//获取对应的数据表模型名称
		//p ($class);//system\model\Stu
		$this->table = strtolower ( ltrim ( strrchr ( $class , '\\' ) , '\\' ) );
		//p ($this->table);// 获得表名称  stu
	}

	/**
	 *数据库连接
	 */
	private static function connect ()
	{
		if ( is_null ( self::$pdo ) ) {
			try {
				//echo 1231;die();//测试OK
				//p (c ('database.host'));//主机地址
				//p (c ('database.name'));//数据库名字

				$dsn= 'mysql:host=' . c ( 'database.host' ) . ';dbname=' . c ( 'database.name' );
				self::$pdo = new PDO( $dsn , c ( 'database.user' ) , c ( 'database.pass' ) );//连接终端调用数据库-ok
				self::$pdo->query ( 'set names utf8' );//设置字符集
				self::$pdo->setAttribute ( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );//错误属性设置抛出异常
			} catch ( Exception $e ) {
				throw new Exception( $e->getMessage () );//抛出异常错误
			}
		}
	}

	/**
	 * 有结果集查询
	 *
	 * @param $sql        sql执行语句（主要查询）
	 *
	 * @return array    查询结果集合（数组）
	 * @throws Exception    抛出异常
	 */
	public function query ( $sql )
	{

		try {
			$res = self::$pdo->query ( $sql );//执行mysql查询语句

			return $res->fetchAll ( PDO::FETCH_ASSOC );//抓取数据库关联数据集合
		} catch ( Exception $e ) {
			throw new Exception( $e->getMessage () );//抛出异常错误
		}
	}

	/**
	 * 执行无结果集操作
	 *
	 * @param $sql  sql 执行语句
	 *
	 * @return int    返回受影响的数量
	 * @throws Exception  抛出异常
	 */
	public function exec ( $sql )
	{
		try {
			return self::$pdo->exec ( $sql );
		} catch ( Exception $e ) {
			throw new Exception( $e->getMessage () );//抛出异常错误
		}
	}


	/**
	 * 获取所有数据  select
	 *
	 * @return array
	 * @throws Exception
	 */
	public function get ()
	{
		//echo  '我是系统目录模型中连接测试的';//OK

		//$sql='select * from 319_one where sex="男"';
		//通过原始sql语句，来实现变动调用输出
		//p ($this->field);die();
		$sql = 'select '.$this->field.'from ' . $this->table.$this->where.$this->order.$this->limit;
		//p ($sql);die();//测试sql语句时候连接正确OK;
		return $this->query ( $sql );//把查询结果返回出去，方便调用结果数据
	}


	/**
	 * 查询条件关键字where
	 */
	public function where($where){
		//echo '我是where条件语句方法';die();//加载OK
		//p ($where);//参数条件id=8  age>60

		//如果参数传了条件，就把where和条件参数拼接在一起，如果没有传参数，就默认给空值;
		  $this->where=$where?' where '.$where:'';
		return $this;//是为了给get方法作条件使用
	}


	/**
	 * 排序ORDER
	 */
	public function orderBy($order){
		//p ($order);//排序条件	age>35
		//echo '我是frame\model Base.php里面的排序方法';//加载成功OK
		$this->order=$order?' order by '.$order:'';
		return $this;
	}


	/**
	 * 获得指定列数据
	 */
	public function field($field=''){//这里要给$field一个默认值，防止他报错
		//echo '测试列数据是否正常加载';//OK
		//p ($field);//name
	$this->field=$field?$field.' ':' * ';
	return $this;
	}


	/**
	 * 截取任意条数数据
	 */
	public function limit($num=''){
		//echo '我是测试截取数据函数方法是否加载';//OK
		$this->limit=$num?' limit '.$num:'';
		return $this;

	}


	/**
	 * 获得单一一条数据
	 */
	public function find ( $pri )
	{
		//p ($pri);//为传的参数，
		$id  = $this->getPriField ();//调用主键名
		$sql = 'select * from ' . $this->table . ' where ' . $id . '=' . $pri;

		//因为每次运行的时候都是查找的单一一条数据，所以可以把他转成一个一维数组
		return current ( $this->query ( $sql ) );
	}


	/**
	 * 获取主键名
	 */
	public function getPriField ()
	{
		//echo 1313;die();//OK
		//查看表结构
		$sql = $this->query ( 'desc ' . $this->table );
		//p ($sql);die();//二维数组（索引）
		//循环$sql，是为了获得表结构里面的主键名
		foreach ( $sql as $item ) {
			//p ($item);
			if ( $item[ 'Key' ] == 'PRI' ) {//注意这里的key首字母大写，表格字段里面的系统字节都是首字母大写的
				return $item[ 'Field' ];
			}

		}

	}


}