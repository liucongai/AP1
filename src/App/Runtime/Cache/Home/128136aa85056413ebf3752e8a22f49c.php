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
    <script type="text/javascript" src="/AP1/Public/js前台/myjs.js"></script>
    <script type="text/javascript" src="/AP1/Public/js前台/im.js"></script>

    <script src="/AP1/Public/js前台/main.js"></script>
    <link rel="stylesheet" type="text/css" href="/AP1/Public/css前台/style3.css" />

    <script type="text/javascript" src="/AP1/Public/js/jquery.cookie.js"></script>

    <link rel="stylesheet" type="text/css" href="/AP1/Public/css前台/perset/settings.css" />
    <link rel="stylesheet" type="text/css" href="/AP1/Public/css前台/perset/login-regist.css" />
    <link rel="stylesheet" type="text/css" href="/AP1/Public/css前台/perset/a.css" />



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
				<li><a href="<?php echo U('Interlocution/index');?>" target="_self">社区</a></li>
			</ul>
		</div>
        <div id="login-area r" >
            <?php if(!empty($_SESSION['home'])): ?><ul  class="clearfix logined touimg"  style="display:<?php echo ($mask2); ?>;">
        	   
                <li class="set_btn user-card-box">
                    <a id="header-avator" class="user-card-item" action-type="my_menu" href="http://www.imooc.com/space/index" target="_self"><img src="/AP1/Uploads/<?php echo ($_SESSION['home']['img']); ?>" width="40" height="40">
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
                                <a href="" class="my-sns l">我的社区</a>
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
                        <input type="text" class="full-width has-padding has-border" id="signup-yzm" placeholder="验证码" name="yzm" style="width:150px;position:relative"><img src="<?php echo U('Login/yzm');?>" alt="" style="width:150px;position:absolute;left:160px;"  onclick="this.src=this.src+'?i='+Math.random()">
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
                        <input type="text" class="full-width has-padding has-border" id="signup-yzm" placeholder="验证码" name="yzm" style="width:150px;position:relative"><img src="<?php echo U('Login/yzm');?>" alt="" style="width:150px;position:absolute;left:160px;"  onclick="this.src=this.src+'?i='+Math.random()">
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



<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="/AP1/Public/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="/AP1/Public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/AP1/Public/css/bootstrap.min.css" />


    <script type="text/javascript" charset="utf-8" src="/AP1/Public/utf8-php/ueditor.config.js"></script> 
    <script type="text/javascript" charset="utf-8" src="/AP1/Public/utf8-php/ueditor.all.min.js"> </script>    
    <script type="text/javascript" charset="utf-8" src="/AP1/Public/utf8-php/lang/zh-cn/zh-cn.js"></script>
     <script type="text/javascript" charset="utf-8" src="/AP1/Public/js/ueditor.js"></script>

    <link rel="stylesheet" type="text/css" href="/AP1/Public/css/wrt.css" />
</head>
<body>
     <div class="clear"></div>
<div class="allheader-nav">
    <div  class="ww">
        <div  class="logo fl">
            <img src="/AP1/Public/img/shequlogo.png">
           
        </div>
        <a href="<?php echo U('Interlocution/index');?>">问答</a>
        <a href="<?php echo U('Opus/index');?>">作品</a>
        <a href="<?php echo U('Article/index');?>">文章</a>
        <a href="<?php echo U('Activity/index');?>">活动</a>
        <a style="float:right;" href="<?php echo U('Myclub/index','');?>">我的社区</a>
    </div>
</div>

<div class="clear"></div>

    <div class="main">
        <div class="ww">
        <div class="article-right">
			<div class="rule-body">
            <h3 class="article-title">投稿须知</h3>
                <dt>
                    <dd>1.文章类型：技术、设计/交互、产品、与IT相关的任何学习心得、技术分享、职场经验、项目案例、甚至慕课网自学的励志故事等类型均可；</dd>
                    <dd>2.拒绝广告：文章内容必须健康，符合国家相关法律法规规定，谢绝任何形式软文、公关稿、新闻稿；</dd>
                    <dd>3.尊重版权：投稿作品必须为原创，否则慕课网有权拒绝发表或在发表后协助原版权所有者追究其法律责任；</dd>
                    <dd>4.排版：正文配图务必从本地上传，并保证清晰，请勿超过2M（图片不得添加任何形式广告水印，否则审稿工作人员有权删除）；</dd>
                    <dd>5.审核时间：您发布的文章均需经工作人员审核；审核通过后，如需再修改，文章将再次进入审核；我们承诺会在投稿后的2个工作日内审核完毕；</dd>
                    <dd>6.其他：审核通过后，请勿随意编辑文章，若编辑文章过于频繁，慕女神将拒绝发布哦（如果是软文/新闻稿/公关稿，小编将直接删除），谢谢理解。</dd>
            </dt>
            </div>
        </div>

		<div class="article-left">
            <h4>发布文章</h4>
			
			<form action="<?php echo U(dowrt);?>" method="post" enctype="multipart/form-data">
                
                <div class="art-title">
                    <span class="allred">*</span>
                    <span >标题:</span>
                
                <input type="text" id="title" class="form-control title" name="title" placeholder="请输入问题标题" maxlength="253" />
                </div>
                <p id="errortip"></p>
                <script>
                    var error1 = function(){
                        if($('#title').val().length <= 4){
                            if($('#errortip').children().length>0){
                                $('#errortip').empty();
                            }
                            $('#errortip').append('<small><i class="glyphicon glyphicon-info-sign"></i>标题不能少于5个字符！</small>');
                        };
                        if($('#title').val().length >= 5 ){
                            $('#errortip').empty(); 
                        }; 
                    }
                    $('#title').bind('blur',error1);   
                </script>
                
                <div id="pic2">
                <div  class="art-cover">
                    <span class="allred">&nbsp</span>
                    <span >封面:</span>
                    <div class="face-upload">
                        <div class="coverit" />
                            <div class="word">上传图片</div>
                            <input id="pic" class="uppic" type="file" name="file" accept="" />
                        </div>
                        <span  class="updes"><small>封面为500*500像素的 PNG/JPG/GIF 格式图片</small></span>
                    </div> 
                </div>
                <div class="showpic"></div>
                </div>
                <script>
                    $("#pic").change(function(){
                        $('.showpic').children().remove();
                        var objUrl = getObjectURL(this.files[0]) ;            
                        $('.showpic').append('<img style="width:100px;" src="'+ objUrl +'" alt="">').append('<span id="delit" onclick="delit()">删除</span>');

                    });

                    //建立一個可存取到改file的url
                    function getObjectURL(file) {
                        var url = null ; 
                        if (window.createObjectURL!=undefined) { // basic
                            url = window.createObjectURL(file) ;
                        } else if (window.URL!=undefined) { // mozilla(firefox)
                            url = window.URL.createObjectURL(file) ;
                        } else if (window.webkitURL!=undefined) { // webkit or chrome
                            url = window.webkitURL.createObjectURL(file) ;
                        }
                        return url ;
                    }
                    //$(".showpic").delegate("#delit","click",delit);
                    //$("#delit").on("click",delit);
                    var delit = function(){
                       // alert(1);
                        $('.showpic').children().remove();
                    };
                        
                    </script>
                    
                    <div class="clear"></div>

                    <div class="art-class">
                        <span class="allred">*</span>
                        <span >栏目:</span>
                    
                        <select name="cate" >
                            <option value="000">请选择栏目</option>
                            <option value="001">前端开发</option>
                            <option value="002">后端开发</option>
                            <option value="003">程序人生</option>
                            <option value="004">设计</option>
                            <option value="005">移动开发</option>
                            <option value="006">其他</option>
                        </select>
                    </div>

                    <div class="art-content">
                        <span class="allred">*</span>
                        <span >内容:</span>
                        <script id="container" class="content" name="content" type="text/plain" style="width:780px;height:300px;"></script>
                        
                    </div>
                    <div class="clear"></div>
                    <div class="art-submit">
                       
                        <input class="submit"  type="submit"  value="提交" />
                        <span><small>文章提交审核通过后自动发布，审核期间您可以在个人中心我的文章-我的原创中查看文章审核进度</small></span>
                    </div>
                    
    				
    				
    				


    			</form>
    			
    		</div>
            </div>
    
        </div>
     <div class="clear"></div>
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

    </body>

    </html>