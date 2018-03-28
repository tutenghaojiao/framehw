<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台首页</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
			<?php include '../app/admin/view/header.php';?>
            <div class="col-xs-3">
                <div class="list-group">
                    <a href="?s=admin/index/index" class="list-group-item active">
                        欢迎页
                    </a>
                    <a href="?s=admin/grade/index" class="list-group-item ">班级管理</a>
                    <a href="?s=admin/student/index" class="list-group-item">学生管理</a>
                </div>
            </div>
            <div class="col-xs-9">
                <div class="panel panel-default">
                	  <div class="panel-heading">
                			<h3 class="panel-title" style="text-align: center">后台简介</h3>
                	  </div>
                	  <div class="panel-body">
                          <table class="table table-hover">
                              <thead>
                              <tr>
                                  <th>栏目</th>
                                  <th>参数</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>系统环境</td>
                                  <td>apache</td>
                              </tr>
                              <tr>
                                  <td>php版本</td>
                                  <td>php7.1</td>
                              </tr>
                              <tr>
                                  <td>开发者</td>
                                  <td>周天君</td>
                              </tr>
                              <tr>
                                  <td>联系我</td>
                                  <td>ztj1030@qq.com</td>
                              </tr>
                              </tbody>
                          </table>

                      </div>
                </div>
            </div>
        </div>
    </div>
	<?php include '../app/admin/view/footer.php';?>

</body>
</html>