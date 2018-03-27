<?php
/**
 *description		2018年3月27日16:17:38学生页面编辑
 *FILE_NAME          framehw
 *author             周天君
 *date               2018/3/27 0:20:23
 */

namespace app\admin\controller;


use frames\view\View;
use system\model\Grade;
use system\model\Student;

class StudentController extends CommonController
{
	/**
	 * 学生管理首页
	 * @return mixed
	 */
	public function index(){
		//p (1111);die();//正常加载;
		$data = Student::orderBy('s_id desc')->get();//获取整个表得数据
		//p ($data);die();//OK
		return View::with(compact ('data'))->make();
	}

	/**
	 * 添加学生名称页面
	 * @return mixed
	 */
	public function store(){
		//获得班级信息
		$GradeData=Grade::get();
		//p($GradeData);die();
		if (IS_POST){
			//p ($_POST);die();//打印新增得内容OK
			Student::insert($_POST);
			Student::update($_POST);
			//echo 11;die();
			//必须要给return才能不出现两个页面
			return $this->reDrict ('?s=admin/student/index')->message ('添加学生成功');
		}

		return View::with(compact ('GradeData'))->make();
	}

	/**
	 * 编辑班级信息
	 * @return mixed
	 */
	public function edit(){
		$gid=$_GET['gid'];
		//p ($gid);die();//要编辑得数据下标
		//$data=Grade::find($gid);
		$StudentData=Student::where('s_id='.$gid)->first();//获得当前班级信息
		$GradeData=Grade::get();//获得当前班级信息
		//p ($GradeData);//获得得班级所有信息
		//p ($StudentData);die();//获得单条学生旧数据
		if ($_POST){
			//p ($_POST);
			//修改好的数据返回出来
			$res=Student::where('s_id='.$gid)->update($_POST);
			//p ($res);//返回受影响得数据数量
			//修改之后得得提示信息和跳转地址
			if ($res){
				return $this->reDrict ('?s=admin/student/index')->message ('修改成功');
			}else{
				return $this->reDrict ('?s=admin/student/index')->message ('编辑失败');
			}
		}
		//获得旧数据，将数据显示在模板页面上（方便动态调用）;
		return View::with(compact ('StudentData','GradeData'))->make();
	}

	/**
	 * 删除页面信息
	 */
	public function del(){
		$gid=$_GET['gid'];
		//p ($gid);die();
		//删除对应得数据
		Student::where('s_id='.$gid)->delete();
		//删除成功后得提示信息
		return $this->reDrict ('?s=admin/student/index')->message ('删除成功');
	}

}