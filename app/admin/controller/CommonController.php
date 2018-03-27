<?php
/**
 *description		 登录之前的验证
 *FILE_NAME          framehw
 *author             周天君
 *date               2018/3/26 16:16:30
 */

namespace app\admin\controller;


use frames\core\Controller;

class CommonController extends Controller
{
	public function __construct ()
	{
		//登录验证
		if (!isset($_SESSION['a_name'])){//如果么有用户名，那么就调到登录页面
			$this->reDrict ('?s=admin/login/index')->message ('请登录');
			exit();

		}
	}
}