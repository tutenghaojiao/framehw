<?php
/**
 *description
 *FILE_NAME          framehw
 *author             周天君
 *date               2018/3/25 14:17:04
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
	<title>恭喜您</title>
</head>
<body>
<div class="jumbotron" style="background: #ffffff;margin: 100px;text-align: center">
	<div class="container">

		<h1><?php echo $data[0];?></h1>
		<p><?php echo $data[1];?></p>

	</div>
</div>
</body>
</html>
