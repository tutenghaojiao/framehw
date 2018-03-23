<?php
namespace app\home\controller;

use houdunwang\core\Controller;
use houdunwang\model\Model;
use houdunwang\view\View;
use system\model\Stu;

class IndexController extends Controller
{
	public function index(){
		//1.Controller
			//$this->setRedirect ()->message ();
		//2.View
			//1.Boot.php中增加echo ,干什么用的，
			//2.return View::make(),return 可不可去掉
			//3.调用make、with方法，程序如何运行，结果如何返回
			//p(View::with()->make());
			//return View::with()->make();
			//return (new Base())->make();
			//return (new Base);
		//3.Model
			//1.测试加载配置项文件c函数 c() c('database')  c('database.name')
			$res = c();
			//p($res);
			//$res = c('databas2e');
			//$res = c('database');
			//p($res);
			//$res = c('database.name');
			//p($res);
			//2.c函数测试完成之后，将其替换到houdunwang/model/Base.php中链接数据库地方
				//$data = Model::query('select * from student');
				//p($data);

				//将模板后缀的配置项进行替换，并进行测试
				//return View::make();
				//自己创建配置文件，将Boot.php里面时区进行替换(从配置项读取)
			//3.测试模型中进行封装
			//	$data = Stu::get();//获取stu表中所有的数据
			//	p($data);

				//获取单一条数据
				//$data = Stu::find(1);//找主键为1的这一条数据
				//p($data);

				//where条件
					//查找stu表中cid=1的所有数据
					//$data = Stu::where('cid=1')->get();
					//p($data);
				//order 排序
					//$data = Stu::where('cid=1')->orderBy('sid asc')->get();
					//p($data);
				//获取指定列数据field：select name from stu
				//limit
					$data = Stu::where('cid=1')->orderBy('sid asc')->field('sid,name')->limit(3)->get();
	}


}