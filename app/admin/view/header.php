<nav class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="?s=home/index/index">Home</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav navbar-right">
            <span style="float: left;margin:15px auto">用户名：</span><li><a href="javascript:;"><?php echo  $_SESSION['a_name'] ;?></a></li>
			<li><a href="?s=admin/login/out">退出</a></li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>