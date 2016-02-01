<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>
		慕课网
	</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="renderer" content="webkit">
    <script type="text/javascript" src="/AP1/Public/js/jquery-1.9.1.js"></script>

    <!--<link rel="stylesheet" type="text/css" href="/AP1/Public/css前台/mystyle.css" />-->

    <script src="/AP1/Public/js前台/main.js"></script>
    <link rel="stylesheet" type="text/css" href="/AP1/Public/css前台/style3.css" />

    <script type="text/javascript" src="/AP1/Public/js/jquery.cookie.js"></script>






    <style>
          

            /*模态框*/
            .logo1 {float: left;}
            #logo1 {margin: 0 20px;}
            #logo1 a,
            .logo1 a {
                display: block;
                height: 60px;
                width: 140px;
                background: url(/AP1/Public/img前台/logo.png);
                text-indent: 100%;
                white-space: nowrap;
                overflow: hidden;
                }
            .logo1 a {
            -webkit-transition: background-color 0.2s;
            -moz-transition: background-color 0.2s;
            transition: background-color 0.2s;
            }
            .logo1 a:hover {
                background-color: #363c41;
            }
            
            /*图片上传的CSS*/
            .a-upload {
                padding: 4px 10px;
                height: 20px;
                line-height: 20px;
                position: relative;
                cursor: pointer;
                color: #888;
                background: #fafafa;
                border: 1px solid #ddd;
                border-radius: 4px;
                overflow: hidden;
                display: inline-block;
                *display: inline;
                *zoom: 1
            }

            .a-upload  input {
                position: absolute;
                font-size: 100px;
                right: 0;
                top: 0;
                opacity: 0;
                filter: alpha(opacity=0);
                cursor: pointer
            }

            .a-upload:hover {
                color: #444;
                background: #eee;
                border-color: #ccc;
                text-decoration: none
            }
        </style>
</head>
<body id="List_courseId">

<div id="header">
	<div class="page-container" id="nav">
        <div class="logo1" id="logo1"><a href="<?php echo U('Index/index');?>" target="_self" class="hide-text"></a></div>
		<div style="height:60px;" class="g-menu-mini l">
			<a href="http://www.imooc.com/course/list#" class="menu-ctrl">
				<i class="icon-menu"></i>
			</a>
			<ul class="nav-item l">
                <li>
                    <a href="<?php echo U('Course/index');?>" target="_self">课程</a>
                </li>
                <li><a href="<?php echo U('Plan/index');?>" target="_self">计划</a></li>
				<li><a href="<?php echo U('Share/index');?>" target="_self">分享</a></li>
				<li><a href="<?php echo U('Interlocution/index');?>" target="_blank">社区</a></li>
			</ul>
		</div>
        <div id="login-area r" >
            <?php if(!empty($_SESSION['home'])): ?><ul  class="clearfix logined touimg"  style="display:<?php echo ($mask2); ?>;">
        	   
                <li class="set_btn user-card-box">
                    <a id="header-avator" class="user-card-item" action-type="my_menu" href="<?php echo U('Space/index');?>" target="_self"><img src="/AP1/Uploads/<?php echo ($_SESSION['home']['img']); ?>" width="40" height="40">
                        <i class="myspace_remind" style="display: none;"></i>
                        <span style="display: none;">动态提醒</span>
                    </a>
                    <div class="g-user-card">
                        <div class="card-inner">
                            <div class="card-top">
                                <img src="/AP1/Uploads/<?php echo ($_SESSION['home']['img']); ?>" alt="<?php echo ($_SESSION['home']['nick']); ?>" class="l">
                                <span class="name text-ellipsis"><?php echo ($_SESSION['home']['nick']); ?></span>
                                <p class="meta">
                                <a href="http://www.imooc.com/space/experience">经验<b id="js-user-mp"><?php echo ($_SESSION['home']['score']); ?></b></a>
                                <a href="http://www.imooc.com/myclub/credit">积分<b id="js-user-mp"><?php echo ($_SESSION['home']['experience']); ?></b></a>                                   
                                </p>
                            </div>
                            <div class="card-links" >
                                <a href="<?php echo U('Space/index');?>" class="my-mooc l">我的慕课<i class="dot-update"></i></a>
                                <span class="split l" ></span>
                                <a href="<?php echo U('Myclub');?>" class="my-sns l">我的社区</a>
                            </div>
                            <div class="card-sets clearfix">
                                <a href="<?php echo U('Percenter/perset');?>" class="l">个人设置</a>
                                <a href="<?php echo U('Login/logout');?>" class="r">退出</a>
                            </div>
                        </div>
                        <i class="card-arr"></i>
                    </div>
                </li>
            </ul>
            <?php else: ?>
            <ul class="main_nav" style="display:<?php echo ($mask1); ?>">	
                    <li class="header-signin">
                        <a id="js-signin-btn" href="#0">登录</a>
                    </li>
                    <li class="header-signup">
                        <a class="cd-signup" href="#0">注册</a>
                    </li>
            </ul><?php endif; ?>
        </div>

        <div class="cd-user-modal"> 
		<div class="cd-user-modal-container">
			<ul class="cd-switcher">
				<li><a href="#0">用户登录</a></li>
				<li><a href="#0">注册新用户</a></li>
			</ul>

			<div id="cd-login"> <!-- 登录表单 -->
                <form class="cd-form" method="post" action="<?php echo U('Login/index');?>">
					<p class="fieldset">
						<label class="image-replace cd-username" for="signin-username">用户名</label>
                        <input  name="name" class="full-width has-padding has-border" id="signin-username" type="text" placeholder="请输入用户名 /  mail">
                       
					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signin-password">密码</label>
						<input name="password" class="full-width has-padding has-border" id="signin-password" type="password"  placeholder="请输入密码">
					</p>

                    <p class="fieldset">
                        <label class="image-replace cd-yzm" for="signup-yzm">验证码</label>
                        <input type="text" class="full-width has-padding has-border" id="signup-yzm" placeholder="验证码" name="yzm" style="width:150px;position:relative"><img src="<?php echo U('Login/yzm');?>" alt="" style="width:150px;position:absolute;left:170px;top:5px"  onclick="this.src=this.src+'?i='+Math.random()">
                    </p>

					<p class="fieldset">
						<input type="checkbox" id="remember-me" checked>
						<label for="remember-me">记住登录状态</label>
                    </p>

					<p class="fieldset">
						<input class="full-width2" type="submit" value="登 录">
					</p>
				</form>
			</div>

			<div id="cd-signup"> <!-- 注册表单 -->
                <form class="cd-form" method="post" action="<?php echo U('Reg/reg');?>">
					<p class="fieldset">
						<label class="image-replace cd-username" for="signup-username">用户名</label>
                        <input name="name" class="full-width has-padding has-border" id="signup-username" type="text" placeholder="用户名为2-16位中英文、数字组成">      
                        <span id="span1"></span>
					</p>

					<p class="fieldset">
                    <label class="image-replace cd-password" for="signup-password">密码</label>
                    <input name="password" class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="密码为6-12位数字、字母、下划线组成">
                        <span id="span2"></span>
                    </p>

                    <p class="fieldset">
						<label class="image-replace cd-email" for="signup-email">mail</label>
                        <input name="email" class="full-width has-padding has-border" id="signup-email" type="email" placeholder="输入mail">
                        <span id="span3"></span>
					</p>


                    <p class="fieldset">
                        <label class="image-replace cd-yzm" for="signup-yzm">验证码</label>
                        <input type="text" class="full-width has-padding has-border" id="signup-yzm" placeholder="验证码" name="yzm" style="width:150px;position:relative"><img src="<?php echo U('Login/yzm');?>" alt="" style="width:150px;position:absolute;left:170px;top:5px"  onclick="this.src=this.src+'?i='+Math.random()">
                        <span id="span4" style="position:absolute;left:315px;top:15px"></span>
                    </p>
					
					<p class="fieldset">
						<input class="full-width2" type="submit" value="注册新用户">
					</p>
				</form>
			</div>

			<a href="#0" class="cd-close-form">关闭</a>
        </div>
    </div> 

    
        <div class="search-area" data-search="top-banner" style="position:absolute;right:200px;">
            <input class="search-input" data-suggest-trigger="suggest-trigger" placeholder="请输入想搜索的内容..." type="text" autocomplete="off">
            <ul class="search-area-result" data-suggest-result="suggest-result" style=""></ul>
            <input type="button" class="btn_search" data-search-btn="search-btn">
        </div>
	

        <script>


            $('.nav-item').find('a').eq($.cookie("ho_nav")).addClass('active');

            $('.search-area-result').on('click','li',function(){


                var input = $(this).text();

                if (input) {
                    window.document.location.href = "/AP1/Home/Search/index/words/" + input + "";
                }

                return false;

            });




            $(".search-input").click(function(e){

                //$(this).unbind('blur');


                $('.search-area-result').children().remove('.rab');

                $.get('<?php echo U("Search/se_ajaxName");?>',function(result){

                    for (var i=0;i<result.length;i++)
                    {
                        $('.search-area-result').append( '<li class="rab" >'+ result[i] +'</li>');

                    }



                });

                $('.search-area').addClass('suggest-active');
                $('.search-area-result').slideDown("fast");


                return false;

            });



            // 传值跳转
            $('.btn_search').bind('click',function(){

                var input = $('.search-input').val();

                if(input) {
                    window.document.location.href = "/AP1/Home/Search/index/words/" + input + "";
                }
            });


            document.onclick = function(){

                $('.search-box').removeClass('suggest-active');
                $('.suggest-list').slideUp("fast");
                $('.search-area').removeClass('suggest-active');
                $('.search-area-result').slideUp("fast");

            };

        </script>
</div>
</div>



<link rel="stylesheet" type="text/css" href="/AP1/Public/css/saved_resource_se.css" />
<link rel="stylesheet" type="text/css" href="/AP1/Public/css/mystyle.css" />


<div id="main">

    <div class="search-container">

        <!--banner start-->
        <div class="search-banner" >
            <div class="search-box clearfix" data-search="search-page">
                <div class="suggest-input-box l">
                    <input class="suggest-input J-suggest-input" data-suggest-trigger="suggest-trigger" placeholder="请输入想搜索的内容..." type="text" autocomplete="off" value="<?php echo ($words); ?>">
                    <s class="btn-text-clear" data-clear-btn="clear-btn" title="清空">清空</s>
                </div>
                <input type="button" class="btn-search tokyo-se" data-search-btn="search-btn" value="搜索">
                <ul class="suggest-list" data-suggest-result="suggest-result">

                </ul>
            </div>
        </div>

        <!--banner end-->

        <div class="search-main clearfix">
            <!--search result start-->
            <div class="search-result l">
                <ul class="type-list J-type-list clearfix">
                    <li class="type-item selected" data-type="课程">课程</li>
                    <li class="type-item" data-type="问答">问答</li>
                    <li class="type-item" data-type="文章">文章</li>
                    <li class="type-item" data-type="作品">作品</li>
                    <li class="type-item" data-type="Wiki">Wiki</li>
                    <li class="move-light" style="left: 0px; width: 120px; overflow: hidden;"></li></ul>
                <div class="result-list J-result-list">
                    <div class="result-header clearfix">
                        为您找到相关<span>课程<?php echo ($count); ?></span>个
                        <!--<span class="popular-sort J-popular-sort">最热排序</span>
                        <span class="latest-sort J-latest-sort">最新排序</span>-->
                    </div>
                    <ul class="search-course">
                        <?php if(is_array($detail)): foreach($detail as $key=>$val): ?><li class="course-item border-btm">
                                <div class="course-item-content clearfix">
                                    <div class="thumbnail">
                                        <div class="thumbnail-inner">
                                            <a href="<?php echo U('View/index',array('view'=>$val['id']));?>" target="_blank"><img alt="" src="/AP1/Uploads/<?php echo ($val["fimg"]); ?>"></a>
                                        </div>
                                    </div>
                                    <div class="introduction">
                                        <h2 class="title autowrap"><a href="<?php echo U('View/index',array('view'=>$val['id']));?>" target="_blank"><?php echo ($val["lesson"]); ?></a></h2>
                                        <div class="description autowrap">课程简介：<?php echo ($val["lesson_desc"]); ?></div>
                                        <div class="chapter autowrap">课程大纲： </div>
                                    </div>
                                </div>
                            </li><?php endforeach; endif; ?>


                    </ul>

                    <div class="page js-page"><?php echo ($page); ?></div>

                </div>
            </div>
            <!--search result end-->

            <!--hot-search start-->
            <dl class="hot-search r">
                <dt>热门搜索</dt>
                <dd class="tokyo_hot">
                    <?php if(is_array($tag)): foreach($tag as $key=>$vo): ?><a href="<?php echo U('index',array('words'=>$vo));?>">
                            <?php echo ($vo); ?>
                        </a><?php endforeach; endif; ?>
                </dd>
            </dl>
            <!--hot-search end-->

        </div>
    </div>

</div>
<script>
    $(function(){


        // 传值跳转
        $('.tokyo-se').bind('click', function () {

            var input = $('.suggest-input').val();

            if (input) {
                window.document.location.href = "/AP1/Home/Search/index/words/" + input + "";
            }
        });

        // 记忆框
        $('.suggest-list').on('click', 'li', function () {


            var input = $(this).text();

            if (input) {
                window.document.location.href = "/AP1/Home/Search/index/words/" + input + "";
            }

            return false;

        });


        document.onclick = function(){

            $('.search-box').removeClass('suggest-active');
            $('.suggest-list').slideUp("fast");
            $('.search-area').removeClass('suggest-active');
            $('.search-area-result').slideUp("fast");

        };

        $(".suggest-input").click(function (e) {


            $('.search-box').addClass('suggest-active');
            //$('.suggest-list').css('display', 'block');
            $(".suggest-list").slideDown("fast");
            $('.suggest-list').children().remove('.rab');

            $.get('<?php echo U("Search/se_ajaxName");?>', {'id': 1}, function (result) {

                for (var i = 0; i < result.length; i++) {
                    $('.suggest-list').append('<li class="rab" >' + result[i] + '</li>');

                }

            });

            return false;

        });



    });

</script>

<div id="footer">
    <div class="waper">
        <div class="footerwaper clearfix">
            <div class="followus r">
                <a class="followus-weixin" href="javascript:;" target="_blank" title="微信">
                    <div class="flw-weixin-box"></div>
                </a>
                <a class="followus-weibo" href="http://weibo.com/u/3306361973" target="_blank" title="新浪微博"></a>
                <a class="followus-qzone" href="http://user.qzone.qq.com/1059809142/" target="_blank" title="QQ空间"></a>
            </div>
            <div class="footer_intro l">
                <div class="footer_link">
                    <ul>
                        <li><a href="<?php echo U('Index/index');?>" target="_blank">网站首页</a></li>
                        <li><a href="<?php echo U('About/job');?>" target="_blank">人才招聘</a></li>
                        <li> <a href="<?php echo U('About/contact');?>" target="_blank">联系我们</a></li>
                        
                        <li><a href="<?php echo U('About/us');?>" target="_blank">关于我们</a></li>
                        <li> <a href="<?php echo U('About/teacher');?>" target="_blank">讲师招募</a></li>
                        <?php if(!empty($_SESSION['home'])): ?><li> <a href="<?php echo U('About/suggest1');?>" target="_blank">意见反馈</a></li>     
                        <?php else: ?>
                        <li> <a href="<?php echo U('About/suggest');?>" target="_blank">意见反馈</a></li><?php endif; ?>
                        <li> <a href="<?php echo U('About/friendly');?>" target="_blank">友情链接</a></li>
                    </ul>
                </div>
                <p>Copyright © 2015 imooc.com All Rights Reserved | 京ICP备 13046642号-2</p>
            </div>
        </div>
    </div>
</div>
<div id="J_GotoTop" class="elevator">
    <a class="elevator-weixin" href="javascript:;">
        <div class="elevator-weixin-box">
        </div>
    </a>
    <a class="elevator-msg" href="<?php echo U('About/suggest');?>" target="_blank" id="feedBack"></a>
    <a class="elevator-app" href="http://www.imooc.com/mobile/app">
        <div class="elevator-app-box">
        </div>
    </a>
    <a class="elevator-top" href="javascript:;" style="display:none" id="backTop"></a>
</div>

</body>

<script type="text/javascript">
	
		$('#signup-username').blur(function(){
            	var name = $(this).val();
                $.get('<?php echo U("Reg/ajaxName");?>',{name:name},function(result){
                    
                  if(result==1)	
                  $('#span1').html('<font color="red">用户名已存在</font>');
                  
                  if(result==0){
                      
                       if(name =="")
                      $('#span1').html('<font color="red">用户名不能为空</font>');
                      
                      if( name !="" && !/[\一-\龥a-zA-Z0-9]{2,18}$/.test(name) )
                      $('#span1').html('<font color="red">用户名输入不合法</font>');
                       
                }
			});
        });

		$('#signup-username').focus(function(){
           $('#signup-username').val('');
           $('#span1').html(''); 
        });


        $('#signup-password').blur(function(){
            	var password = $(this).val();
                    if(password =="")
                      $('#span2').html('<font color="red">密码不能为空</font>');
                      
                      if( password !="" && !/^[\w]{6,12}$/.test(password) )
                      $('#span2').html('<font color="red">密码输入不合法</font>');       
                }
			)

		$('#signup-password').focus(function(){
           $('#signup-password').val('');
           $('#span2').html(''); 
		});



		$('#signup-email').blur(function(){
            	var email = $(this).val();
			$.get('<?php echo U("Reg/ajaxEmail");?>',{email:email},function(result){
			      if(result==1)	
                  $('#span3').html('<font color="red">邮箱已被注册</font>');
                   if(result==0){
                   // console.log(1);
                      if(email =="")
                      $('#span3').html('<font color="red">邮箱不能为空</font>');
                      
                      if( email !="" && ! /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/.test(email))
                       $('#span3').html('<font color="red">邮箱输入不合法</font>');
                       
                    }
			});
		});

		$('#signup-email').focus(function(){
           $('#signup-email').val('');
           $('#span3').html(''); 
           });



         $('#signup-yzm').blur(function(){
            	var yzm = $(this).val();
                    if(yzm =="")
                      $('#span4').html('<font color="red">验证码不能为空</font>');
                }
        );

         $('#signup-yzm').focus(function(){
           $('#signup-yzm').val('');
           $('#span4').html(''); 
		})
</script>
</html>