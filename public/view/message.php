<?php
/**
 *description
 *FILE_NAME          framehw
 *author             周天君
 *date               2018/3/25 14:01:38
 */
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>消息提示</title>
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="jumbotron" style="background: white;text-align: center;margin: 10px">
	<div class="container">
		<h1><?php echo $msg?></h1>
		<p><a href="<?php echo $this->url ?>"><span id="time">5</span>秒之后跳转到指定页面也可点击跳转</a></p>
		<p>
			<a class="btn btn-primary btn-lg">获得更多信息</a>
		</p>
	</div>
</div>

<script>
	$(function () {
		setInterval(function () {
		var time=$('#time').text();
		time--;
		if (time==0){
			location.assign('<?php echo $this->url ?>');
		}
            $('#time').text(time)
        },1000)
    })
</script>
</body>
</html>

