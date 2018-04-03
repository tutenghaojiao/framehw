<?php
/**
 *description
 *FILE_NAME          framehw
 *author             周天君
 *date               2018/3/26 16:43:26
 */

namespace app\admin\controller;



use frames\view\View;

class IndexController extends CommonController
{
	/**
	 * 后台登录成功后显示的欢迎页面
	 */
	public function index(){

		return View::make();
	}
}