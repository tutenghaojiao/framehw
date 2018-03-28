<?php
/**
 *description
 *FILE_NAME          framehw
 *author             周天君
 *date               2018/3/25 10:13:48
 */

namespace app\home\controller;


use frames\core\Controller;
use frames\model\Model;
use frames\view\View;
use system\model\Admin;
use system\model\Grade;
use system\model\Student;

class IndexController extends Controller
{
public function index(){
	//默认加载欢迎页面

	//return View::make();//默认加载欢迎界面

	$GradeData=Grade::get();//拿到班级表里面的信息
	//p($GradeData);die();
	return View::with(compact ('GradeData'))->make();//分配班级数据到页面


//echo 1 //错误提示设置成功
//	echo '我是app\home\controller里面的 index 方法';//OK
//parent::ceshi ();//OK

	//3.封装视图view
			//1.加载模板
			//(new View())->make();
			//View::make();

			//2、分配变量(经过的每个方法都必须要return)
			//p (View::with());die();//frames\view\Base Object  得到的是一个对象
			$data=['侠影','天煞','蜀山','少林'];
			$test='我是分配变量';
			//p (compact ('data','test'));//关联数组
		 //return View::with(compact ('data','test'));
		 //return View::with(compact ('data','test'))->make('index');


	//4、测试model（操作数据库)
			//1、有结果查询
			//p ( Model::query('select * from stu'));//OK
			//2、无结果集查询;返回受影响条数
			//p (Model::exec('update stu set name="煞星" where id=2'));

			//3、测试加载配置项，把数据库模型里面的数据改成在外部文件可修改的
			//	创建C函数，通过传递参数来获取相应的配置项文件里面的数据
			//	$res=c ();
			//	$res=c ('database');
			//	$res=c ('database.host');
			//	p ($res);die();
			//4、把变动的配置项元素给放到相应的文件中;
			//	$data=Model::query('select * from grade');
				//p ($data);die();
				//p (date ('Y-m-d H:i:s',time ()));//时区测试

			//p (Model::first());
}

public  function add(){
	//echo '我是app\home\controller里面的add方法';//OK

	//2、测试controller书写的方法
	//链式操作需要保证:每一节都是对象
	//$this->reDrict ('?s=admin/index/add')->message ('修改版');
	//$this->welcome ('恭喜你Congratulation!!!');
}


public function  welcome(){
	return View::make();//默认加载欢迎界面
}

	/**
	 *
	 *首页学生表展示页面
	 * @return mixed
	 *
	 */
public function student(){
	//echo 111;die();//加载到了这个方法OK
	$gid=$_GET['id'];//获得地址栏id当作下标（实际找的的是班级对应得id编号）
	$StudentData=Student::where('g_id='.$gid)->get();//查找对应班级得数据
	//$GradeData=current (Grade::field('g_name')->where('g_id='.$gid)->get());//获得对应班级的名字
	$GradeData=current (Grade::field('g_name')->find($gid));//获得对应班级的名字
	//p($GradeData);die();
	//p ($StudentData);die();//OK
	return View::with(compact ('StudentData','GradeData'))->make();//把获得得数据分配到页面

}
}