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




<link rel="stylesheet" type="text/css" href="/AP1/Public/css/saved_resource_l.css" />

<div class="course-infos">
	<div class="w pr">
		<div class="path">
			<a href="<?php echo U('Course/index');?>">课程</a>
			<i class="path-split">\</i><a href="<?php echo U('Course/index?fx_id='.$fangx['id']);?>"><?php echo ($fangx["name"]); ?></a>
			<i class="path-split">\</i><a href="<?php echo U('Course/index?ca_id='.$cate['id']);?>"><?php echo ($cate["name"]); ?></a>
			<i class="path-split">\</i><span><?php echo ($lesson["lesson"]); ?></span>
		</div>
		<div class="hd">
			<h2 class="l"><?php echo ($lesson["lesson"]); ?></h2>

		</div>
		<div class="statics clearfix">
			<div class="static-item ">
				<span class="meta-value"><strong><?php echo ($lesson["nandu"]); ?></strong></span>
				<span class="meta">难度</span>
				<em></em>
			</div>
			<div class="static-item static-time">
				<span class="meta-value"><strong> 1</strong>小时<strong>35</strong>分</span>
				<span class="meta">时长</span>
				<em></em>
			</div>
			<div class="static-item">
				<span class="meta-value"><strong><?php echo ($per_num); ?></strong></span>
				<span class="meta">学习人数</span>
				<em></em>
			</div>
			<!-- <div class="static-item">
              <span class="meta-value"><strong>4.8分</strong></span>
              <span class="meta">
                <i class="meta-star"></i>
                <i class="meta-star"></i>
                <i class="meta-star"></i>
              </span>
              <em></em>
            </div> -->
		</div>
		<div class="extra">
			<!-- credit -->
			<div class="share-rl-tips share-posi js-share-statue" style="display: none;">
				<span>分享即可 +</span><strong>1积分</strong>
				<span class="rule-arrow"></span>
			</div>
			<!-- share -->
			<div class="share-action r bdsharebuttonbox bdshare-button-style0-16" data-bd-bind="1447312324643">
				分享
				<a href="javascript:;" class="share wx js-share" data-cmd="weixin" title="分享到微信"></a>
				<a href="javascript:;" class="share qq js-share" data-cmd="qzone" title="分享到QQ空间"></a>
				<a href="javascript:;" class="share sina js-share" data-cmd="tsina" title="分享到新浪微博"></a>
			</div>
			<i class="split-line r"></i>
			<p hidden><?php echo ($lesson["id"]); ?></p>
			<?php echo ($attr); ?>
				　
			<script>
				$('.extra').find('span').click(function(){
					if($(this).text().length == 2){

						$(this).css('background','url("/AP1/Public/img/info_s.png") no-repeat 0 -157px').text('已关注');

						$.get('<?php echo U("View/attention");?>', {'id':$(this).prev().text() });

					}else{
						$(this).css('background','url("/AP1/Public/img/info_s.png") no-repeat 0 -37px').text('关注');

						$.get('<?php echo U("View/reat");?>', {'id':$(this).prev().text() });
					}
				});
			</script>
		</div>
	</div>
	<div class="info-bg" id="js-info-bg">
		<div class="cover-img-wrap">
			<img data-src="/AP1/Uploads/<?php echo ($lesson["fimg"]); ?>" alt="" style="display: none" id="js-cover-img">
		</div>
		<div class="cover-mask"></div>
		<canvas style="opacity:0.3;filter:'alpha(opacity=50)';background-size:100% 100%" width="1349" height="240" class="cover-canvas" id="js-cover-canvas"></canvas></div>
</div>
<script>
	var img = $('#js-cover-img').attr('data-src');
	$('.cover-canvas').css("background-image", "url("+ img + ")");
</script>

    <div class="course-info-main clearfix w">

        <div class="info-bar clearfix" >
           <!-- <a href="<?php echo U('learn?lesson_id='.$lesson['id']);?>"-->
            <div style="display: <?php echo ($mask3); ?>">
                <a href="<?php echo U('video',array('id'=>$memory['video_id']));?>" target="_blank" class="btn-red start-study-btn r J-learn-course">继续学习</a>
                <span class="start-study-title">
                    <?php echo ($memory["xi_name"]); ?>
                </span>

                <div class="exp-progress">
                    <span class="exp-txt">
                        <span class="exp-per">
                            <strong><?php echo ($progress); ?></strong>%
                        </span>

                        学习进度

                    </span>
                    <div class="exp-bar">
                        <ins style="width:<?php echo ($progress); ?>%"></ins>
                    </div>
                </div>
            </div>

            <ul class="main_nav" style="display: <?php echo ($mask4); ?>"><a href="#0" class="btn-red start-study-btn r J-learn-course">开始学习</a></ul>

        </div>
        <div class="content-wrap clearfix">
        <div class="content">
            <div class="mod-tab-menu">
                <ul class="course-menu clearfix">
                    <li><a class="ui-tabs-active active" id="learnOn" href="./JavaScript入门篇_技术学习教程_慕课网_files/JavaScript入门篇_技术学习教程_慕课网.html">
                        <span>章节</span></a></li>
                    <li><a id="commentOn" class="" href="<?php echo U('learn2',array('lesson_id'=>$lesson['id']));?>"><span>评论</span></a></li>


                </ul>
            </div>


            <div id="notice" class="clearfix">
                <div class="l"> <strong>课程公告:</strong> <a href="javascript:void(0)">开放了编程练习参考代码</a> </div>
            </div>

            <div class="mod-chapters">

                <?php if(is_array($z_detail)): foreach($z_detail as $key=>$val): ?><div class="chapter" onclick="change(this)">
                        <p hidden><?php echo ($val["id"]); ?></p>
                        <h3>
                            <span class="icon-plus"></span>
                            <strong><i class="state-expand"></i><?php echo ($val["zh_name"]); ?></strong>
                        </h3>
                        <ul class="video">

                        </ul>
                    </div><?php endforeach; endif; ?>
            </div>

        </div>
        <div class="aside r">
            <div class="bd">
                <div class="box mb40">
                    <h4>讲师提示</h4>
                    <div class="course-info-tip">
                        <dl class="first">
                            <dt>课程须知</dt>
                            <dd class="autowrap">该课程是针对新手的一个简单基础的课程，让您快速了解JS，通过一些简单的代码编写体会JS。如果您已经对JS有所了解，可以跳过本课程，学习JS进阶课程，进一步学习JS相应的基础知识。学习本课程，希望您至少具备HTML/CSS基础知识，认识常用的标签。</dd>
                        </dl>
                        <dl>
                            <dt>老师告诉你能学到什么？</dt>
                            <dd class="autowrap">1. 理解JavaScript基础语法；
                                2. 掌握常用语句的使用方法；
                                3. 学会如何获取DOM元素及进行简单操作。</dd>
                        </dl>
                    </div>
                </div>
            </div>    </div>
    </div>
        <div class="clear"></div>
    </div>

</div>
<script>

    function change(ob){


        $(ob).siblings().removeClass("chapter-active");

        $(ob).toggleClass("chapter-active");

        var $emp = $(ob).find('p').text();

        $(ob).find('ul').children().remove('.del_m');

        $(ob).siblings().find('ul').children().remove('.del_m');

        $.get('<?php echo U('xi_ajaxName');?>',{id:$emp},function(result){
            console.dir($(result));

            var url = '/AP1/Home/View/video';
            $.each(result,function(i,val){

                var tt = val['video_id'];

                $(ob).find('ul').append( '<li class="del_m"><a target="_blank" href="'+ url + '?id=' +tt + '" class="J-media-item programme">'+ val['xi_name'] +'</a></li>');
            });





        });

    }
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