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
	private static $pdo = null;//连接数据库，为了不重复连接，将第一次的连接状态保存下来，

	/**
	 * 数据库连接
	 */
	public function __construct ()
	{
		if ( is_null ( self::$pdo ) ) {//如果数据库为null表示没有连接，就执行下面的语句
			try {
				$dsn  = 'mysql:host='.c ('database.host').';dbname='.c ('database.dbname');
				self::$pdo = new PDO( $dsn , c ('database.user') ,c ('database.password') );
				self::$pdo->query ( c ('database.header'));//设置字符集
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
	 * @param $sql
	 *
	 * @return int
	 * @throws Exception
	 */
	public function exec ( $sql )
	{
		//p ($sql);//sql更新语句
		try{
			return self::$pdo->exec( $sql );

		}catch(Exception $e){
			throw new Exception($e->getMessage ());
		}
	}

}