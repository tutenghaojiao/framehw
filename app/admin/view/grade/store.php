<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加班级</title>
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
                <a href="?s=admin/index/index" class="list-group-item ">
                    欢迎页
                </a>
                <a href="?s=admin/grade/index" class="list-group-item active">班级管理</a>
                <a href="?s=admin/student/index" class="list-group-item">学生管理</a>
            </div>
        </div>
        <div class="col-xs-9">
            <form action="" method="POST" class="form-horizontal" role="form">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">添加班级</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">班级名称</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" name="g_name" id="" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
            </form>
        </div>
    </div>
</div>
<?php include '../app/admin/view/footer.php';?>

</body>
</html>