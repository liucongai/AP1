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

     <link rel="stylesheet" type="text/css" href="/AP1/Public/css/wd-detail.css" />
     <link rel="stylesheet" type="text/css" href="/AP1/Public/css/reply.css" />




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
            <div class="dt-silder">
                
            </div>

	        <div class="dt-main">
                <div class="dt-nav"><a href="<?php echo U('Interlocution/index');?>">全部问题</a></div>
                <script>
                    $('.dt-nav').append(' > <a href="<?php echo U('index');?>">官方活动</a>');
                </script>

                <div class="clear"></div>
                
                <div class="dt-header clearfix">
                                     
                    <a class="de-header-left" href="">
                        <img style="width:40px;"  class="img-circle img" src="/AP1/Uploads/<?php echo ($qlist["user_pic"]); ?>">
                        <span><?php echo ($qlist["user_name"]); ?></span>
                    </a>
                    
                    <div class="de-header-right fr">
                        <ul>
                           
                            <li class="header-li"><i  class="glyphicon glyphicon-heart"></i></li>
                            <li class="header-li header-care">关注</li>
                        </ul>
                    </div>
                    <script>                        
                        if(<?php echo ($tlist); ?>==1){
                                $('.glyphicon-heart').css("color","red");
                                $('.header-care').html("已关注");
                            }else{
                                $('.glyphicon-heart').css("color","#CED1D1");
                                $('.header-care').html("关注");
                            };
                        $('.glyphicon-heart').click(function(){
                            if($('.header-care').html().length==2){
                                $('.glyphicon-heart').css("color","red");
                                $('.header-care').html("已关注");
                                $.get("<?php echo U(docare);?>", { care_id: 1, act_id:"<?php echo ($qlist['id']); ?>"} );
                            }else{
                                $('.glyphicon-heart').css("color","#CED1D1");
                                $('.header-care').html("关注");
                                $.get("<?php echo U(docare);?>", { care_id: 0, act_id:"<?php echo ($qlist['id']); ?>"} );
                            };
                        });
                        
                        
                    </script>
                </div>
                
                <div class="dt-content">
                    <div class="dt-content-ke">
                    <div class="dt-content-main">
                        <h2><B><?php echo ($qlist["title"]); ?></B></h2>
                        <?php echo (htmlspecialchars_decode($qlist["content"])); ?>
                    </div>
                    
                    <div class="dt-content-bottom">
                        <span class="fl"><?php echo ($qlist["time"]); ?></span>
                        <div class="tag-list">
                            <span class="wdtag">
                                <?php foreach($val['tag'] as $key1 => $val1): ?>
                                <a class="wdtag-a " href="<?php echo ($val1["id"]); ?>"><?php echo ($val1["name"]); ?></a>
                                <?php endforeach; ?>
                            </span>
                        </div>
                        <span class="content-b fr"><?php echo ($qlist["ans_count"]); ?> 回答</span>
                        <span class="content-b fr"><?php echo ($qlist["ans_bw"]); ?> 浏览</span>
                    </div>
                    </div>
                </div>

                <div id="dt-allcomment">
                <?php if(is_array($alist)): foreach($alist as $key=>$val): ?><div class="dt-comment">
                    <div class="dt-per-comment">
                        <div class="cm-header">
                            <a href="">
                                <img style="width:40px;"  class="img-circle img" src="/AP1/Uploads/<?php echo ($val["user_pic"]); ?>">
                                <span><?php echo ($val["user_name"]); ?></span>
                            </a>
                        </div>
                        <div class="cm-content">
                            <div class="cm-main">
                                <?php echo (htmlspecialchars_decode($val["answ"])); ?>
                            </div>
                            <div class="cm-b">
                                <span><?php echo ($val["time"]); ?></span>
                                <div class="cm-bf">
                                    <span  name="<?php echo ($val["user_id"]); ?>" onclick="reply(this)"><i class="glyphicon glyphicon-comment"></i>回复</span>
                                    <!-- <span><i class="glyphicon glyphicon-thumbs-up"></i>赞</span>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        
                        
                    </script>

                    <div class="cm-replyall">

                            <?php foreach($val['reply'] as $key1 => $val1): ?>
                            <div class="cm-replyper">
                                <a class="cm-replyper-header" href="<?php echo ($val1["user_id"]); ?>"><img style="width:40px;" class="img-circle img" src="/AP1/Uploads/<?php echo ($val1["reply_pic"]); ?>"></a>
                                <div class="cm-replyper-main">
                                    <p><a href="<?php echo ($val1["user_id"]); ?>"><?php echo ($val1["reply_name"]); ?></a>
                                    回复
                                    <a href="<?php echo ($val1["before_id"]); ?>"><?php echo ($val1["reply_qname"]); ?></a>
                                    </p>
                                    <p><?php echo (htmlspecialchars_decode($val1["reply"])); ?></p>

                                    <div class="cm-replyper-b">
                                        <span class="mr10"><?php echo ($val1["time"]); ?></span>
                                        <span name2="<?php echo ($val1["reply_name"]); ?>" name="<?php echo ($val1["user_id"]); ?>" onclick="reply(this)" style="cursor:pointer;" class="repp mr10" >
                                            <i class="icon-resp"></i>
                                            回复
                                        </span>
                                        <span class="fr">#<?php echo ($key1+1); ?></span>
                                    </div>
                                </div>
                            </div>
                             <?php endforeach; ?>
                        </div>
                        <div style="display:none" class="replyit">
                        <div class="qa-replies">
                            <div class="js-qa-reply-ibox qa-reply-ibox clearfix" style="">  
                                <div class="qa-reply-iavator">
                                    <a title="" href=""><img  class="img-circle myimg"  width="40" height="40" src="/AP1/Uploads/<?php echo ($_SESSION['home']['img']); ?>"></a>
                                </div>
                                <form action="<?php echo U('doreplyit');?>" method="post">
                                <input type="hidden" name="answ_id" value="<?php echo ($val["id"]); ?>">
                                <input type="hidden" id="before_id" name="before_id" value="">
                                <div class="qa-reply-iwrap">
                                    <div class="qa-reply-iarea">
                                        <textarea id="ipt" class="js-reply-ipt-default ipt" placeholder="写下你的评论..." name="replyit" /></textarea>
                                    </div>
                                </div>
                                
                                <div class="qa-reply-ifoot clearfix">
                                    <div class="qa-reply-footright r">
                                        <div onclick="iptcancel(this)" class="btn btn-default">取消</div>
                                        <input type="submit" class="btn btn-primary" value="提交">
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                    <script>
                        function iptcancel(ob){
                            $(ob).parents('.replyit').css("display","none");
                        }
                        function reply(ob){
                            $bid=$(ob).attr('name');
                           
                            if($(ob).attr('name2') != undefined){
                                $bid2='回复 '+ $(ob).attr('name2') +':';
                            }else{
                                $bid2='';
                            }
                           $('#before_id').val($bid);
                           $(ob).parents('.dt-comment').children('.replyit').css("display","block").parents().siblings().children('.replyit').css("display","none");
                           $('#ipt').val($bid2); 
                           
                        } 
                        
                    </script>
                </div><?php endforeach; endif; ?>
                </div>



                <div class="dt-input">
                    <form action="<?php echo U(dodetail);?>" method="post">
                        <input  type="hidden" name="qid" value="<?php echo ($qlist['id']); ?>" />
                    <div class="me-header">
                        <img style="width:40px;" class="img" src="/AP1/Uploads/<?php echo ($_SESSION['home']['img']); ?>">
                    </div>
                    <script>
                        $a = '<?php echo ($_SESSION['home']['id']); ?>'; 
                        if($a==''){ $(".myimg").attr({src:"/AP1/Public/img/avatar_default.png"});}
                    </script>
                    <script id="container" class="content" name="content" type="text/plain" style="width:730px;height:140px;"></script>
                   <div class="clear"></div>
                    <p><input type="submit" class="submit" value="回答" /></p>
                    </form>
                    
                </div>
                
                <nav>
                      <ul class="pagination">                       
                        <?php echo ($pageButton); ?>   
                      </ul>
                    </nav>
                    <script>
                        $('.pagination div a').unwrap('div').wrap('<li></li>');
                        $('.pagination span').wrap('<li class="active"></li>');
                    </script>
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