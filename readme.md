#   后盾框架学习

* #####    Model         （模型）表示应用程序核心（比如数据库记录列表）。
* #####   View           （视图）显示数据（数据库记录）。
* #####   Controller     （控制器）处理输入（写入数据库记录）。

##      文件目录
####        1、app                业务实现;应用目录，开发者
            ｜—home                      前台文件目录
                ｜—controller            控制器类
                ｜—view                  视图
            
            
            ｜—admin                     后台文件目录            
            
####       2、frames             框架核心资源文件    
           ｜—core                       核心框架
           
           ｜—model                      模块    
            
           ｜—view                       视图层     
           
####      3、public             公共支持
          ｜—view                        模板文件目录、静态资源
          
          ｜—index.php                   单一入口文件
              
####      4、system             配置
          ｜—model                       处理业务的各种模型类
                ｜—Stu.php               数据表文件
            
          ｜—config                      配置项文件
                ｜—database.php          数据库连接、初始化数据配置文件  
                ｜—view.php              文件后缀名配置文件
            
          ｜—helper.php                  助手函数文件



        
        