<?php
/**
 *description		登录控制器类
 *FILE_NAME          framehw
 *author             周天君
 *date               2018/3/26 16:37:56
 */

namespace app\admin\controller;


use frames\core\Controller;
use frames\view\View;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use system\model\Admin;


class LoginController extends Controller
{
	/**
	 * 后台首页
	 */
public function index(){
//p ($_SESSION);die();
	//$test = 'admin ';
	//var_dump($test);//正常加载
	//p (md5 ('admin888'));//加密后的密码 7fef6171469e80d32c0559f88b377245
	//p (md5 ('qq123456'));//d0dcbf0d12a6b1e7fbfa2ce5848f3eff
if (IS_POST){
	//p ($_POST);die();//正常加载数据
	//检测数据库配置项是否正确

	//1、比对用户名和密码
	//在system/model创建Admin.php和Grade类
	$pass=md5 ($_POST['a_psw']);
	//p ($pass);
	$where="a_name='{$_POST['a_name']}' and a_psw='{$pass}'";
	//p ($where);die();//条件成功
	$match=Admin::where($where)->first();
	//p ($match);
	if (!$match){//如果不能匹配成功执行跳转到登录页面和提示信息
		return $this->reDrict ('?s=admin/login/index')->message ('用户名或者密码不正确');
	}

	//2、验证码比对
	//p($_POST['captcha']);
	//p ($_SESSION['phrase']);die();
	if ($_SESSION['phrase']!=strtolower ($_POST['captcha'])){
		return $this->reDrict ('?s=admin/login/index')->message ('验证码不正确');
	}

	//4、将用户信息储存到session，判断用户是否登录
	$_SESSION['a_name'] = $_POST['a_name'];
	//判定时候选择了七天登录
	//相当于检测auto这个变量是否存在，变量值是否为on
	if (isset($_POST['auto'])&&$_POST['auto']=='on'){
		//如果勾选了七天登录，那么就给浏览器cookies设置设定生命周期
		//并且把session文件存放到根目录里面，记忆作用
		setcookie (session_name (),session_id (),time()+7*24*3600,'./');
	}else{
		//如果没有勾选七天登录，那么就给cookies的生命周期设定为0;
		setcookie (session_name (),session_id (),0,'/');
	}	


	//3、登录成功提示信息，并且跳转（用户信息存储到session,是为了在登录成功之后把用户名输出到页面上去）
	//$_SESSION['a_name']=$_POST['a_name'];
	//p($_SESSION['a_name']);exit();//抓取成功
	return $this->reDrict ('?s=admin/index/index')->message ('恭喜您登录成功');

}


	//加载登录模板
	return View::make();

}


	/**
	 * 加载验证码
	 */
public function captcha(){
	$phraseBuilder = new PhraseBuilder(4, '0123456789');//文字控制
	$builder = new CaptchaBuilder(null, $phraseBuilder);
	$builder->build($width = 150, $height = 35, $font = null);//验证码大小
	header('Content-type: image/jpeg');//图片格式
	$builder->output();
	$_SESSION['phrase'] =strtolower ( $builder->getPhrase());//验证码比对，转小写
}


/**
 * 退出登录(清除session)
 */
public function  out(){
	session_unset ();
	session_destroy();
	//调到登录页面
	header ('location:?admin/login/index');die;
}

}