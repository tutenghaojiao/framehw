<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>班级管理后台系统</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!--    字体库-->
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
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
                			<h3 class="panel-title">班级管理页面</h3>
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
                          			<td><?php echo $v['g_id']?></td>
                          			<td><?php echo $v['g_name']?></td>
                          			<td>
                                        <div class="btn-group btn-group-xs">
                                            <a href="?s=admin/grade/edit&gid=<?php echo $v['g_id']?>" class="btn btn-primary">编辑</a>
                                            <!-- 给删除添加点击事件,找到对应数据得参数下标-->
                                            <button type="button" class="btn btn-danger" onclick="del(<?php echo $v['g_id'];?>)">删除</button>
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
    <script>

        // 2018年3月27日16:08:03


        function del(gid) {
            // alert(gid);
            // 只需一行 JavaScript 代码，即可通过元素的 id myModal 调用模态框：
            // 给模态框起一个id名称方便抓取
            $('#myModal').find('.confirm').attr('gid',gid);
            $('#myModal').modal('show');//让模态框显示出来
        }

        //确定按钮
        function confirm(obj) {
            var gid = $(obj).attr('gid');
            // alert(gid);return;
            location.href = '?s=admin/grade/del&gid='+gid;
        }
    </script>

<!--    以下模态框包含了模态框的头、体和一组放置于底部的按钮。-->
    <div class="modal fade" tabindex="-1"  id='myModal' role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">确认是否删除此信息</h4>
                </div>
                <div class="modal-body">

                    <p>
                        <i class="fa fa-refresh fa-spin fa-4x"></i>
                    <span>   删除无法恢复请谨慎操作！！！</span>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary confirm" onclick="confirm(this)">确认</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>
</html>