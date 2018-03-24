<?php
/**
 *description
 *FILE_NAME          18-03-22-c91frame
 *author             周天君
 *date               2018/3/22 15:12:16
 */

namespace app\home\controller;


use frame\core\Controller;
use frame\model\Base;
use frame\model\Model;
use frame\view\View;
use system\model\Stu;

class IndexController extends Controller//继承Controller类
{
	public function index(){
		//echo '我是app\home\controller -IndexController 类中的index方法';//OK


		//dsdsd;//错误测试 OK


		//2018年3月22日16:48:03 开始部分
		//1、测试是否能正常引入父级Controller的方法OK
		//parent::index ();


		//3、开始封装视图层（view）
				//测试 调用view里面的make方法，会报错找不到该方法
				//View::make();//静态调用，找不到就会自动触发view.php里面的静态方法;测试正常触发OK
				//(new View())->make();//实例化调用,找不到就会自动触发view.php里面的方法;测试正常触发OK


				//测试加载模板和分配变量功能
				//p(View::with());//正常加载OK，返回值为null;必须保证在经过的每个方法(View类中__callStatic、View类中的runParse、Base里面的with)中都return
				$test='我是测试的分配变量一号';//变量
				$tst=['西瓜','苹果','桃子'];//数组
				//compact ('test','tst');
				//p(compact ('test','tst'));//$test和$tst合并成了一个关联数组



				//2.View
				//1.Boot.php中增加echo ,干什么用的，
				//2.return View::make(),return 可不可去掉
				//3.调用make、with方法，程序如何运行，结果如何返回
				//p(View::with()->make());
				//return View::with()->make();
				//return (new Base())->make();
				//return (new Base);
				//return View::with(compact ('test','tst'))->make('welcome');
				//return View::with()->make();
				//return View::make('welcome')->with(compact ('test','tst'));



		//4、测试model操作数据库
		//	$data=Model::query('select*from 319_one');//正常抓取OK
		//	//$data=Model::exec('update 319_one set age=29 where id=13');//正常更新OK
		//	p ($data);//测试打印




		//2018年3月23日15:01:34 开始部分
		//5、Model配置项处理文件
				//	A.测试加载配置项文件的函数c（在助手函数helper里面）;

						//当未传参数的时候，参数默认是null,——笼统性得调用（即所有配置文件数据）
						//最终返回是配置项目录里面所有得配置项文件得数据（得到一个关联数组）;
						$res=c ();
						//p ($res);

						//当传了一个参数得时候，默认加载得是与这个参数同名得配置文件(返回一个关联数组)——具有针对性得调用配置项
						//如果不存在这个文件，默认 返回一个null
						$res=c ('database');
						//p ($res);

						//当传两个参数得时候，会找到这个对应配置文件里面得元素值
						//如果配置项中不存在这个元素，就返回null，存在就返回出这个元素对应得值
						$res=c ('database.name');
						//p ($res);

				//B、将配置好的文件数据替换到frame\model\Base.php文件里面的数据库连接函数里面
						//$data=Model::query('select*from 319_one');
						//p ($data);//正常调出数据库里面表数据——OK

						//将模板后缀的配置项进行替换,测试(frame\view\Base.php里面的make方法)
						//return View::make();//没有传参数默认输出：我是index测试文字！！！！！！！！！！！



			    //作业一：时区和头部从配置项读取测试(配置项放在system config database.php里面)
					//		echo '我是网页编码测试';//OK
					//		p (date ('Y-m-d H:i:s',time ()));//在配置项里面设置时区为UTC,时间改变--OK


				//C、测试模型中进行封装
						//1.这一步会报错，首先检查文件之间是否正常引入;OK
						//其次就要检测composer配置文件里面是否配置了当前调用的这个类所在的目录的名称OK
						//$data= Stu::get();
						//p ($data);//正常接收表整个319_one中的数据OK

						//2.获取单一一条数据
						//	$data=Stu::find(3);
						//	p ($data);//正常抓取输出

						//3.主键名称抓取测试，配合find（）方法使用
						//$id=Stu::getPriField();//主键测试OK
						//p ($id);//id 返回结果为主键名称OK

						//4.条件where测试
						//$data=Stu::where('id=8')->get();
						//p ($data);//以数组的形式输出id等于8的那条数据

						//5.排序order测试
						//Stu::orderBy('age desc');
						//$data=Stu::where('age>60 ')->orderBy('age desc')->get();
						//p ($data);//OK


						//作业二：
						//1.获得列数据（指定字段数据）
						//p (Stu::field('name'));
						//$data=Stu::where('age>60 ')->orderBy('age desc')->field('name')->get();
						//p ($data);//5条满足条件的数据 OK

						//2.截取任意数量的数据
						//Stu::limit();//OK
						//$data=Stu::where('age>60 ')->orderBy('age desc')->field('name')->limit()->get();
						//p ($data);//OK


	}




	public function  add(){
		//echo '我是app\home\controller -IndexController 类中的 add 方法';//OK


		//2018年3月22日16:48:03 开始部分
		//2、测试controller中的方法setRedirect和message：

		//方法一子类调用：
		//$this->setRedirect ('?s=home/article/index');
		//$this->message('恭喜您！！添加成功');

		//方法二链式操作：
		$this->setRedirect ('?s=home/article/index')->message('恭喜您！！添加成功');
		p ($this->setRedirect ('?s=home/article/index'));
		//此种操作会报错，报错循序为
		//IndexController.php:36
		//Boot.php(63)
		//Boot.php(21)
		//index.php(10)
		//IndexController.php on line 36
		//此时必须要给Controller里面的setRedirect方法加个return，因为链式操作必须要是一个对象才能继续下一个连接的操纵
	}
}