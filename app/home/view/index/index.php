<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>c91学生管理前台展示页面</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row" style="margin-top: 100px">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">班级列表</h3>
                    <a href="?s=admin/index/index" style="float: right;margin-top:-27px;" class="btn btn-primary panel-title">后台登录</a>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>班级编号</th>
                            <th>班级名称</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php foreach ($GradeData as $k=>$v){?>

                            <td><?php echo $v['g_id'] ;?></td>
                            <td><?php echo $v['g_name'] ;?></td>
                            <td>
                                <div class="btn-group btn-group-xs">
                                    <a href="?s=home/index/student&id=<?php echo $v['g_id']?>" type="button" class="btn btn-primary">查看班级学生</a>
                                </div>
                            </td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>