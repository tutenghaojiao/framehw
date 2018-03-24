<?php
/**
 *description
 *FILE_NAME          18-03-22-c91frame
 *author             周天君
 *date               2018/3/22 15:46:49
 */
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
	<title>欢迎光临</title>
</head>
<body>

<div class="jumbotron" style="text-align: center;background: white">
	<div class="container">
		<h1><?php echo $msg?></h1>
		<p><a href="<?php echo $this->url ?>" style="text-decoration: none"><span id="time">5</span>s之后自动跳转</a></p>
		<p>
			<a class="btn btn-primary btn-lg">获得更多</a>
		</p>
	</div>
</div>

<!--设置定时器，让时间变化-->
<script>
		$(function () {
			setInterval(function () {
			var time=$('#time').html();
			time--;
			if(time==0){
			    // 跳转到指定路径
				location.assign("<?php echo $this->url ?>");
			}
                $('#time').html(time);
            },1000)
        })
</script>
</body>
</html>
