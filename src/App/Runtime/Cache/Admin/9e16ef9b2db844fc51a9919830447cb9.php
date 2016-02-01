<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8">

	<title>自动登录</title>

    <style type="text/css">
        body{background:url("/AP1/Public/img/admin/lgbg.jpg") no-repeat;};
    </style>

	<link rel="stylesheet" href="/AP1/Public/admincss/reset.css">

    
	<link rel="stylesheet" href="/AP1/Public/admincss/style1.css" media="screen" type="text/css" />

</head>

<body>
    
	<div id="window" style="display:none;">

		<div class="page page-front;position:relative">
			<form action="<?php echo U('login');?>" method="post">
				<div class="page-content">
					<div class="input-row">
						<label class="label fadeIn" style="position:absolute;top:30px">用户名</label>
						<input name="name" type="text" class="input fadeIn delay1" placeholder="用户名"/>
					</div>
					<div class="input-row">
						<label class="label fadeIn delay2">密码</label>
						<input name="password" type="password" class="input fadeIn delay2" placeholder="密码"/>
					</div>
					<div class="input-row">
						<label class="label fadeIn delay3">验证码</label>
						<input type="text" class="input fadeIn delay3" placeholder="验证码" name="yzm" style="width:150px;"><img src="<?php echo U('yzm');?>" alt="" class="input fadeIn delay4" style="width:150px;position:absolute;right:60px;top:244px"  onclick="this.src=this.src+'?i='+Math.random()">
					</div>


					<div class="input-row perspective">
						<button id="submit" class="button load-btn fadeIn delay4">
							<span class="default">登录</span>
							
						</button>
					</div>
				</div>
			</form>
        </div>
   
		
	</div>
	<script type="text/javascript" src='/AP1/Public/js/admin/jquery-1.8.3.min.js'></script>
	<script type="text/javascript" src='/AP1/Public/js/admin/fyll.js'></script>
	<script type="text/javascript" src="/AP1/Public/js/admin/index.js"></script>
	<div style="text-align:center;">
	</div>

</body>
</html>