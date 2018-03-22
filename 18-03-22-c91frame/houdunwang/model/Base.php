<?php

namespace houdunwang\model;

use PDO;
use Exception;

class Base
{
	private static $pdo = null;

	public function __construct ()
	{
		if ( is_null ( self::$pdo ) ) {
			try {
				$dsn = 'mysql:host=127.0.0.1;dbname=c91';
				self::$pdo = new PDO($dsn,'root','root');
				self::$pdo->query ('set names utf8');
				self::$pdo->setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			} catch ( Exception $e ) {
				throw new Exception($e->getMessage ());
			}
		}
	}

	/**
	 * 执行有结果集的操作(select)
	 * @param $sql	sql语句
	 *
	 * @return array		返回查询的数据
	 * @throws Exception	异常
	 */
	public function query ($sql)
	{
		try{
			$res = self::$pdo->query ($sql);
			return $res->fetchAll (PDO::FETCH_ASSOC);
		}catch (Exception $e){
			throw new Exception($e->getMessage ());
		}
	}

	/**
	 * 执行无结果集的操作(update、delete、insert)
	 * @param $sql		sql语句
	 *
	 * @return int		返回受影响的条数
	 * @throws Exception	异常
	 */
	public function exec($sql){
		try{
			return  self::$pdo->exec  ($sql);
		}catch (Exception $e){
			throw new Exception($e->getMessage ());
		}
	}
}