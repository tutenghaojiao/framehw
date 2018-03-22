<?php
namespace app\home\controller;

use houdunwang\view\View;

class ArticleController
{
	public function index(){
		//echo 'home article index';
		//return View::make();

		//$a = 1;
		//return View::with(compact ('a'));

		//return View::with()->make('aa');

		return View::make()->with();
	}
	public function add(){
		echo 'home article add';
	}


}