<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>班级学生展示页面</title>
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
                    <h3 class="panel-title">
                        【<?php echo $GradeData ;?>】班级对应的学生
                        <div class="btn-group btn-group-xs" style="float: right;">
                            <a href="?s=home/index/index" type="button" class="btn btn-primary">返回主页</a>
                        </div>
                    </h3>

                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>学生编号</th>
                            <th>学生名称</th>
                            <th>学生性别</th>
                            <th>学生年龄</th>
                            <th>学生班级</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php foreach ($StudentData as $k=>$v){?>
                            <td><?php echo $v['s_id'] ;?></td>
                            <td><?php echo $v['s_name'] ;?></td>
                            <td><?php echo $v['s_sex'] ;?></td>
                            <td><?php echo $v['s_age'] ;?></td>
                            <td><?php echo $GradeData;?></td>
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