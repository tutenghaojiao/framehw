<?php
/**
 *description
 *FILE_NAME          framehw
 *author             周天君
 *date               2018/3/27 0:20:23
 */

namespace app\admin\controller;


use frames\view\View;
use system\model\Grade;

class GradeController extends CommonController
{
	public function index(){
		//p (1111);die();
		$data = Grade::orderBy('g_id desc')->get();
		//p ($data);die();//OK
		return View::with(compact ('data'))->make();
	}

	/**
	 * 添加班级名称
	 * @return mixed
	 */
	public function store(){
		if (IS_POST){
			Grade::insert($_POST);
			//echo 11;die();
			//必须要给return才能不出现两个页面
			return $this->reDrict ('?s=admin/grade/index')->message ('添加成功');
		}

		return View::make();
	}

	/**
	 * 编辑班级信息
	 * @return mixed
	 */
	public function edit(){
		$gid=$_GET['gid'];
		//p ($gid);die();//要编辑得数据下标
		//$data=Grade::find($gid);
		$data=Grade::where('g_id='.$gid)->first();
		//p ($data);die();//获得得旧数据
		if ($_POST){
			//p ($_POST);
			$res=Grade::where('g_id='.$gid)->update($_POST);
			//p ($res);//返回受影响得数据数量
			if ($res){
				return $this->reDrict ('?s=admin/grade/index')->message ('修改成功');
			}else{
				return $this->reDrict ('?s=admin/grade/index')->message ('重新编辑');
			}
		}
		//获得旧数据，将数据显示在模板页面上;
		return View::with(compact ('data'))->make();
	}

	/**
	 * 删除页面信息
	 */
	public function del(){
		$gid=$_GET['gid'];
		//p ($gid);die();
		//删除对应得数据
		Grade::where('g_id='.$gid)->delete();
		//删除成功后得提示信息
		return $this->reDrict ('?s=admin/grade/index')->message ('删除成功');
	}

}