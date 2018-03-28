<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台登录</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row" style="width: 60%;margin:100px auto">
           <form action="" method="POST" class="form-horizontal" role="form">
               <div class="form-group">

                   <legend>     
                       <a href="?s=home/index/index" style="margin-top:-15px;" class="btn btn-primary ">返回首页</a>
                       <span style="float: right;margin-top:-7px;" class="btn btn-primary " >登录页面</span>
                   </legend>

               </div>
               <div class="form-group">
                   <label for="" class="col-sm-2 control-label">用户名</label>
                   <div class="col-sm-10">
                       <input type="text" required name="a_name" class="form-control" id="" placeholder="">
                   </div>
               </div>
               <div class="form-group">
                   <label for="" class="col-sm-2 control-label">密码</label>
                   <div class="col-sm-10">
                       <input type="password" required name="a_psw" class="form-control" id="" placeholder="">
                   </div>
               </div>
               <div class="form-group">
                   <label for="" class="col-sm-2 control-label">验证码</label>
                   <div class="col-sm-10">
                       <div class="col-sm-8">
                           <input type="text" required name="captcha" class="form-control" id="" placeholder="">
                       </div>
                       <div class="col-sm-4">
                    <!-- 加载验证码-->
                           <img onclick="this.src=this.src+'&rand='+Math.random()" src="?s=admin/login/captcha" alt="">
                   </div>
                   </div>
               </div>
               <div class="form-group">
                   <label for="" class="col-sm-2 control-label"></label>
                   <div class="col-sm-10">
                       <button type="submit" class="btn btn-primary">登录</button>
                   </div>
               </div>

           </form>
        </div>
    </div>
<div style="width: 100%;text-align: center;margin-top: 100px;font-size: 25px">
    copyright@2018 ZTJ 版权所有
</div>
</body>
</html>