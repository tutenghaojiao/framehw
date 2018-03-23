<?php

namespace houdunwang\model;

use PDO;
use Exception;

class Base
{
	private static $pdo = null;
	private        $table;//操作的数据表
	private $where = '';//where条件
	private $order = '';//order排序
	public function __construct ( $class )
	{
		//链接数据库
		self::connect ();
		//p($class);//system\model\Stu
		//获取对应的模型名称
		$this->table = strtolower ( ltrim ( strrchr ( $class , '\\' ) , '\\' ) );
		//p($this->table);
	}

	/**
	 * 查询where条件
	 * @param $where
	 *
	 * @return $this
	 */
	public function where($where){
		//echo 2;
		//p($where);//cid=1
		//where条件拼接
		$this->where = $where ? ' where ' . $where : '';
		return $this;
	}

	public function orderBy($order){
		//p($order);
		$this->order = $order ? ' order by ' . $order : '';
		return $this;
	}

	/**
	 * 获取所有数据
	 */
	public function get ()
	{
		//p($this->where);
		$sql = "select * from " . $this->table . $this->where . $this->order;
		//p($sql);die;
		return $this->query ( $sql );
	}


	/**
	 * 根据主键获取单一一条数据
	 * @param $pri		主键值
	 *
	 * @return mixed
	 * @throws Exception
	 */
	public function find($pri){
		//p($pri);
		//现获取当前操作的数据表主键字段名是什么
		$priField = $this->getPriField();
		//p($priField);die;
		$sql = "select * from " . $this->table . ' where '.$priField.'=' . $pri;
		//p($sql);die;
		//p($this->query ( $sql ));
		//将结果处理成一维数组返回
		return current ($this->query ( $sql ));
	}

	/**
	 * 获取表主键
	 * @return mixed
	 * @throws Exception
	 */
	private function getPriField(){
		//查看表结构
		$res = $this->query ('desc ' . $this->table);
		foreach ($res as $v){
			if($v['Key'] == 'PRI'){
				return $v['Field'];
			}
		}
	}


	/**
	 * 链接数据库
	 *
	 * @throws Exception
	 */
	private static function connect ()
	{
		if ( is_null ( self::$pdo ) ) {
			try {
				//echo 1;die;
				//p(c('database.host'));
				$dsn       = 'mysql:host=' . c ( 'database.host' ) . ';dbname=' . c ( 'database.name' );
				self::$pdo = new PDO( $dsn , c ( 'database.user' ) , c ( 'database.pass' ) );
				self::$pdo->query ( 'set names utf8' );
				self::$pdo->setAttribute ( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );
			} catch ( Exception $e ) {
				throw new Exception( $e->getMessage () );
			}
		}
	}

	/**
	 * 执行有结果集的操作(select)
	 *
	 * @param $sql    sql语句
	 *
	 * @return array        返回查询的数据
	 * @throws Exception    异常
	 */
	public function query ( $sql )
	{
		try {
			$res = self::$pdo->query ( $sql );

			return $res->fetchAll ( PDO::FETCH_ASSOC );
		} catch ( Exception $e ) {
			throw new Exception( $e->getMessage () );
		}
	}

	/**
	 * 执行无结果集的操作(update、delete、insert)
	 *
	 * @param $sql        sql语句
	 *
	 * @return int        返回受影响的条数
	 * @throws Exception    异常
	 */
	public function exec ( $sql )
	{
		try {
			return self::$pdo->exec ( $sql );
		} catch ( Exception $e ) {
			throw new Exception( $e->getMessage () );
		}
	}
}