<?php
/**
 *FILE_NAME          单一入口文件
 *author             周天君
 *date               2018/3/21 15:42:07
 */

//引入配置项目里面的自动加载文件
include_once'../vendor/autoload.php';

//静态调用核心资源（框架）里面的run方法
//首次调用会报错，未找到,
//	引入composer执行自动加载还是会报错
//	需要配置composer.json文件
//在autoload里面添加两个字节，一个files 引用文件用 ;PSR-4代码规范

//！！！！！！！！！！！配置完之后必须重新启动 在终端执行composer dump;
\test\core\Boot::run();
