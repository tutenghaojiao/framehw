<?php
namespace app\home\controller;

use houdunwang\core\Controller;
use houdunwang\model\Model;
use houdunwang\view\View;

class IndexController extends Controller
{
	public function index(){
		//echo 'home index index';
		//2018年03月22日
		//1.这个测试调用父级index方法，完成之后刷新李兰器可以正常输出
			//parent::index ();
		//3.开始封装视图层(View),代码在houdunwang/view里面书写，在这里测试
			//这里调用，在View类中没有make方法的，所以会自动触发__callStatic()
			//View::make();
			//(new View())->make();
			//测试加载模板和分配变量功能
			//p(View::with());die;
			//在这里必须注意，直接在Base里面的with方法给return是不可以的
			//必须保证在经过的每个方法(View类中__callStatic、View类中的runParse、Base里面的with)中都return
			$test = 'houdunwang';
			$hd = [1,2,3];
			//p(compact ('test','hd'));
			//return View::with(compact ('test','hd'))->make('welcome');
			//return View::with()->make();
			//return View::make('welcome')->with(compact ('test','hd'));
		//4.测试Model(操作数据库)
			$data = Model::query('select * from student');
			//$data = Model::exec('update student set name="葫芦兄弟" where id=7');
			p($data);
	}

	public function add(){
		//2.测试Controller书写的message和setRedirect方法
			//echo 'home index add';
			//对象->方法()
			//链式操作需要保证:每一节都是对象
			//$this对象
			//$this->setRedirect ()还是一个对象，这样才能继续往后调message
			//$this->setRedirect ('?s=home/article/index')->message('添加成功');
		//$this->setRedirect ()->message('添加成功');
	}
}