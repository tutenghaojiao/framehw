<?php
/**
 *description
 *FILE_NAME          framehw
 *author             周天君
 *date               2018/3/25 19:20:00
 */

namespace frames\model;

use Exception;
use PDO;

class Base
{
	private static $pdo   = null;//连接数据库，为了不重复连接，将第一次的连接状态保存下来，
	private        $table;//操作的数据表
	private        $where = '';//查询条件关键字;默认给空值
	private        $order = '';//数据排序;默认给空值
	private        $field='*';//指定列数据
	private        $limit;//截取数据数量

	/**
	 * 数据库连接
	 */
	public function __construct ($class)
	{
		self::content ();
		//p ($class);die();
		$this->table=strtolower ( ltrim ( strrchr ( $class , '\\' ) , '\\' ) );
		//p($this->table);//表名称
	}

	/**
	 * 数据库连接
	 */
	private static function content ()
	{
		if ( is_null ( self::$pdo ) ) {//如果数据库为null表示没有连接，就执行下面的语句
			try {
				$dsn       = 'mysql:host=' . c ( 'database.host' ) . ';dbname=' . c ( 'database.dbname' );
				self::$pdo = new PDO( $dsn , c ( 'database.user' ) , c ( 'database.password' ) );
				self::$pdo->query ( c ( 'database.header' ) );//设置字符集
				self::$pdo->setAttribute ( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );//错误提示
			} catch ( Exception $e ) {
				throw new Exception( $e->getMessage () );//抛出异常信息
			}
		}
	}

	/**
	 * 有结果集查询
	 *
	 * @param $sql 查询语句
	 */
	public function query ( $sql )
	{
		//p ($sql);//sql查询语句
		try {
			$res = self::$pdo->query ( $sql );

			return $data = $res->fetchAll ( PDO::FETCH_ASSOC );
		} catch ( Exception $e ) {
			throw new Exception( $e->getMessage () );
		}
	}

	/**
	 * 无结果集查询
	 *
	 * @param $sql
	 *
	 * @return int
	 * @throws Exception
	 */
	public function exec ( $sql )
	{
		//p ($sql);//sql更新语句
		try {
			return self::$pdo->exec ( $sql );

		} catch ( Exception $e ) {
			throw new Exception( $e->getMessage () );
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
		$sql = 'select ' . $this->field . ' from ' . $this->table . $this->where . $this->order . $this->limit;

		//p ($sql);die();//测试sql语句时候连接正确OK;
		return $this->query ( $sql );//把查询结果返回出去，方便调用结果数据
	}


	/**
	 * 查询条件关键字where
	 */
	public function where ( $where )
	{
		//echo '我是where条件语句方法';die();//加载OK
		//p ($where);//参数条件id=8  age>60

		//如果参数传了条件，就把where和条件参数拼接在一起，如果没有传参数，就默认给空值;
		$this->where = $where ? ' where ' . $where : '';

		return $this;//是为了给get方法作条件使用
	}


	/**
	 * 排序ORDER
	 */
	public function orderBy ( $order )
	{
		//p ($order);//排序条件	age>35
		//echo '我是frame\model Base.php里面的排序方法';//加载成功OK
		$this->order = $order ? ' order by ' . $order : '';

		return $this;
	}


	/**
	 * 获得指定列数据
	 */
	public function field ( $field)
	{//这里要给$field一个默认值，防止他报错
		//echo '测试列数据是否正常加载';//OK
		//p ($field);//name
		$this->field = $field;
		return $this;
	}


	/**
	 * 截取任意条数数据
	 */
	public function limit ( $limit )
	{
		//echo '我是测试截取数据函数方法是否加载';//OK
		$this->limit = " limit " . (int)$limit;

		return $this;

	}


	/**
	 * 获得单一一条数据
	 */
	public function find ( $pri )
	{
		//p ($pri);//为传的参数，
		$id  = $this->getPriField ();//调用主键名
		$sql = 'select '.$this->field.' from ' . $this->table . ' where ' . $id . '=' . $pri;

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




	//2018年3月26日21:59:20
	/**
	 * 根据条件查找一条数据
	 */
	public function first(){
		//echo 1;die();

		//有报错，是limit方法设置错误
		$sql = "select {$this->field} from {$this->table}{$this->where}{$this->order}{$this->limit}" ;
		return current ($this->query ( $sql ));
	}



	//2018年3月27日08:18:19
	/**
	 * 数据删除
	 * @return bool|int
	 * @throws Exception
	 */
	public function delete(){
		if(!$this->where){
			return false;
		}
		$sql = "delete from {$this->table}{$this->where}";
		return $this->exec ($sql);
	}



	/**
	 * 数据更新
	 * @param $data		更新数据
	 *
	 * @return bool|int
	 * @throws Exception
	 */
	public function update($data){
		if(!$this->where){
			return false;
		}
		$fields = '';
		foreach($data as $k=>$v){
			$fields .= $k . '=' . (is_int ($v)?$v:"'$v'") . ',';
		}
		$fields = rtrim ($fields,',');
		$sql = "update {$this->table} set {$fields}{$this->where}";
		return $this->exec ($sql);
	}



	/**
	 * 写入数据
	 */
	public function insert($data){
		$fields = '';$values = '';
		foreach($data as $k=>$v){
			$fields .= $k .',';
			$values .= is_int ($v) ? $v.',' : "'$v'".',';
		}
		$fields = rtrim ($fields,',');
		$values = rtrim ($values,',');
		$sql = "insert into {$this->table} ({$fields}) values ({$values})";
		return $this->exec ($sql);
	}
}