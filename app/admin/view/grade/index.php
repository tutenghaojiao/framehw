<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>c91学生管理后台系统</title>
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
                <div class="panel panel-default">
                	  <div class="panel-heading">
                			<h3 class="panel-title">欢迎页面</h3>
                	  </div>
                	  <div class="panel-body">
                          <table class="table table-hover">
                          	<thead>
                          		<tr>
                          			<th>编号</th>
                          			<th>班级名称</th>
                          			<th>操作</th>
                          		</tr>
                          	</thead>
                          	<tbody>
                                <?php foreach($data as $k=>$v){ ?>
                          		<tr>
                          			<td><?php echo $v['gid']?></td>
                          			<td><?php echo $v['gname']?></td>
                          			<td>
                                        <div class="btn-group btn-group-xs">
                                            <a href="?s=admin/grade/edit&gid=<?php echo $v['gid']?>" class="btn btn-primary">编辑</a>
                                            <button type="button" class="btn btn-danger">删除</button>
                                        </div>
                                    </td>
                          		</tr>
                            <?php } ?>
                          	</tbody>
                          </table>
                      </div>
                </div>
                <a href="?s=admin/grade/store" class="btn btn-primary">添加班级</a>

            </div>
        </div>
    </div>
	<?php include '../app/admin/view/footer.php';?>


</body>
</html>