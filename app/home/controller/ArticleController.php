<?php
/**
 *description
 *FILE_NAME          framehw
 *author             周天君
 *date               2018/3/25 11:43:11
 */

namespace app\home\controller;


use frames\view\View;

class ArticleController
{
	public function index(){
		//echo '我是app\home\controller里面ArticleController的index方法';//OK

		(new View())->make('welcome');
	}
	public function edit(){
		//echo '我是app\home\controller里面类ArticleController的 edit 方法';//OK

	}

}