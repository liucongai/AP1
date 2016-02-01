<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>慕课后台管理系统</title>

    
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <!--js-->
    <script src="/AP1/Public/js/admin/jquery-latest.js"></script>
    <script src="/AP1/Public/js/admin/bootstrap.min.js"></script>
    <script src="/AP1/Public/js/admin/jquery-1.3.2.min.js"></script>
    <script src="/AP1/Public/js/admin/jquery.cookie.js"></script>

    <!-- flot charts -->
    <script src="/AP1/Public/js/admin/jquery.flot.js"></script>
    <script src="/AP1/Public/js/admin/jquery.flot.stack.js"></script>
    <script src="/AP1/Public/js/admin/jquery.flot.resize.js"></script>
    <script src="/AP1/Public/js/admin/theme.js"></script>
 
     <script src="/AP1/Public/js/admin/jquery-latest.js"></script>
    <script src="/AP1/Public/js/admin/bootstrap.min.js"></script>
    <!--js-->

    <!-- bootstrap -->
    <link href="/AP1/Public/admincss/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/AP1/Public/admincss/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="/AP1/Public/admincss/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="/AP1/Public/admincss/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="/AP1/Public/admincss/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/AP1/Public/admincss/layout.css" />
    <link rel="stylesheet" type="text/css" href="/AP1/Public/admincss/elements.css" />
    <link rel="stylesheet" type="text/css" href="/AP1/Public/admincss/icons.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="/AP1/Public/admincss/compiled/index.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/AP1/Public/admincss/compiled/new-user.css" type="text/css" media="screen" />
  

    <!-- open sans font -->
    <link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!-- lato font -->
    <link href='http://fonts.useso.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

    <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="brand" href="<?php echo U('Index/index');?>"><img src="/AP1/Public/img/admin/logo.png" /></a>

            <ul class="nav pull-right">                
                <li class="settings hidden-phone">
                    <a role="button">
                        欢迎您&nbsp;&nbsp;<?php echo ($_SESSION['login']['name']); ?>
                    </a>
                </li>
                <li class="settings hidden-phone">
                <a href="<?php echo U('Login/login');?>" role="button"  onclick="return confirm('确定要注销吗？')">
                        <i class="icon-share-alt"></i>
                    </a>
                </li>
            </ul>            
        </div>
    </div>
    <!-- end navbar -->

<!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="<?php echo U('Index/index');?>">
                    <i class="icon-home"></i>
                    <span>首页</span>
                </a>
                </li>   

             <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>用户管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo U('User/index');?>">用户列表</a></li>
                    <li><a href="<?php echo U('User/add');?>">添加用户</a></li>
                </ul>
            </li>

            <li>
                <a class="dropdown-toggle" href="chart-showcase.html">
                    <i class="icon-signal"></i>
                    <span>分类管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo U('Category/index');?>">分列列表</a></li>
                    <li><a href="<?php echo U('Category/add');?>">添加分类</a></li>
                </ul>
            </li>


            <li>
                <a class="dropdown-toggle" href="calendar.html">
                    <i class="icon-calendar-empty"></i>
                    <span>计划管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo U('Plan/index');?>">计划列表</a></li>
                    <li><a href="<?php echo U('Plan/add');?>">添加计划</a></li>
                </ul>
            </li>



            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-edit"></i>
                    <span>课程管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo U('Lesson/index');?>">课程列表</a></li>
                    <li><a href="<?php echo U('Lesson/add');?>">添加课程</a></li>
                </ul>
            </li>
            
            <li>
                <a class="dropdown-toggle" href="calendar.html">
                    <i class="icon-calendar-empty"></i>
                    <span>分享管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo U('Share/index');?>">分享列表</a></li>
                    <li><a href="<?php echo U('Share/add');?>">添加分享</a></li>
                </ul>
            </li>  

               <li>
                <a class="dropdown-toggle" href="tables.html">
                    <i class="icon-th-large"></i>
                    <span>社区管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo U('Interlocution/index');?>">问答列表</a></li>
                    <li><a href="<?php echo U('Opus/index');?>">作品列表</a></li>
                    <li><a href="<?php echo U('Article/index');?>">文章列表</a></li>
                    <li><a href="<?php echo U('Activity/index');?>">活动列表</a></li>
                    <li><a href="<?php echo U('Activity/add');?>">添加活动</a></li>
                    <li><a href="<?php echo U('Article/index');?>">文章列表</a></li>
                    
                   
                </ul>
            </li>

            <li>
                <a class="dropdown-toggle" href="tables.html">
                    <i class="icon-th-large"></i>
                    <span>意见回复</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo U('Suggest/index');?>">意见列表</a></li>
                   
                </ul>
            </li>

            <li>
                <a class="dropdown-toggle" href="personal-info.html">
                    <i class="icon-cog"></i>
                    <span>讲师考核</span>
                    <i class="icon-chevron-down"></i>
                </a>

                <ul class="submenu">
                    <li><a href="<?php echo U('Lecturer/index');?>">考核列表</a></li>
                </ul>
            </li>

            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-share-alt"></i>
                    <span>Extras</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="code-editor.html">Code editor</a></li>
                    <li><a href="grids.html">Grids</a></li>
                    <li><a href="signin.html">Sign in</a></li>
                    <li><a href="signup.html">Sign up</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- end sidebar -->

   
    



	<!-- main container -->
    <div class="content">
        
        <div class="container-fluid">
            <div id="pad-wrapper" class="new-user">
                <div class="row-fluid header">
                    <h3>Create a new user</h3>
                </div>

                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar">
                        <div class="container">
                            <form class="new_user_form inline-input" action="<?php echo U('User/doadd');?>" method="post"/>
                                <div class="span12 field-box">
                                    <label>Name:</label>
                                    <input id="check1" class="span7" name="name" type="text" />
                                    <span id="span1"></span>
                                </div>
                                <div class="span12 field-box">
                                    <label>password:</label>
                                    <input class="span7" name="password" type="password" />
                                </div>
                                <div class="span12 field-box">
                                    <label>Repassword:</label>
                                    <input class="span7" name="repassword" type="password" />
                                </div>
                                <div class="span12 field-box">
                                    <label>Type:</label>
                                    <div class="ui-select span5">
                                        <select name="type">
                                            <option value="3" />会员
                                            <option value="1" />管理员
                                            <option value="0" />超级管理员
                                            <option value="4" />讲师
                                            <option value="5" />封号
                                        </select>
                                    </div>
                                </div>
                                <div class="span12 field-box">
                                    <label>Sex:</label>
                                    <div class="ui-select span5">
                                        <select name="sex">
                                            <option value="0" />女
                                            <option value="1" />男
                                            <option value="2" />保密
                                        </select>
                                    </div>
                                </div>
                                <div class="span12a field-box">
                                    <label>Email:</label>
                                    <input id="check4" class="span7" name="email" type="text" />
                                    <span id="span4"></span>
                                </div>
                                <div class="span12 field-box">
                                    <label>Phone:</label>
                                    <input id="check5" class="span7" name="phone" type="text" />
                                    <span id="span5"></span>
                                </div>
                                <div class="span12 field-box">
                                    <label>Job:</label>
                                    <input class="span9" name="job" type="text" />
                                </div>
                                <div class="span12 field-box">
                                    <label>Address:</label>
                                    
                                        <input class="span9" name="address" type="text" placeholder="Street address" />
                                    
                                </div>
                                <div class="span12 field-box textarea">
                                    <label>Sign:</label>
                                    <textarea name="sign"class="span9"></textarea>
                                    <span class="charactersleft">90 characters remaining. Field limited to 100 characters</span>
                                </div>
                                <div class="span11 field-box actions">
                                    <input type="submit" class="btn-glow primary" value="Create user" />
                                    <span>OR</span>
                                    <input type="reset" value="Cancel" class="reset" />
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- side right column -->
                    <div class="span3 form-sidebar pull-right">
                        <div class="btn-group toggle-inputs hidden-tablet">
                            <button class="glow left active" data-input="inline">INLINE INPUTS</button>
                            <button class="glow right" data-input="normal">NORMAL INPUTS</button>
                        </div>
                        <div class="alert alert-info hidden-tablet">
                            <i class="icon-lightbulb pull-left"></i>
                            Click above to see difference between inline and normal inputs on a form
                        </div>                        
                         
                         <p>Choose one of the following file types:</p>
                        <ul>
                            <li><a href="<?php echo U('User/index');?>">User_list</a></li>
                            <li><a href="<?php echo U('User/add');?>">User_add</a></li>
                        </ul> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->

    <!-- end main container -->


    <!--
    <script type="text/javascript" src="/AP1/Public/js/jquery-1.8.3.min.js"></script>-->
		
       <script type="text/javascript">
          //模板自带js
          $(function () {

            // toggle form between inline and normal inputs
            var $buttons = $(".toggle-inputs button");
            var $form = $("form.new_user_form");

            $buttons.click(function () {
                var mode = $(this).data("input");
                $buttons.removeClass("active");
                $(this).addClass("active");

                if (mode === "inline") {
                    $form.addClass("inline-input");
                } else {
                    $form.removeClass("inline-input");
                }
            });
        });
    



         //模板自带的js

	//alert(1);
		// function check(obj){
		// 	alert(1);
		// 	var name = obj.value;
		// 	$.get('<?php echo U('ajaxName');?>',{name:name},function(result){
		// 	      if(result==1)	
  //                 $('#check').after('<font>’+用户名已存在+’</font>');           
  
             
		// 	});
		// }
		$('#check1').blur(function(){

			//alert(1);
			
            	var name = $(this).val();
            	//alert(name);
			$.get('<?php echo U('ajaxName');?>',{name:name},function(result){
			      if(result==1)	
			      	//alert(1);
                  $('#span1').html('<font color="red">用户名已存在</font>');           
  
             
			});
		})

		$('#check1').focus(function(){
           //alert(1);
           $('#check1').val('');
           $('#span1').html(''); 
		})

		$('#check4').blur(function(){

			//alert(1);
			
            	var email = $(this).val();
            	//alert(name);
			$.get('<?php echo U('ajaxEmail');?>',{email:email},function(result){
			      if(result==1)	
			      	//alert(1);
                  $('#span4').html('<font color="red">邮箱已存在</font>');           
  
             
			});
		})

		$('#check4').focus(function(){
           //alert(1);
           $('#check4').val('');
           $('#span4').html(''); 
		})

		$('#check5').blur(function(){

			//alert(1);
			
            	var phone = $(this).val();
            	//alert(name);
			$.get('<?php echo U('ajaxPhone');?>',{phone:phone},function(result){
			      if(result==1)	
			      	//alert(1);
                  $('#span5').html('<font color="red">手机号已存在</font>');           
  
             
			});
		})

		$('#check5').focus(function(){
           //alert(1);
           $('#check5').val('');
           $('#span5').html(''); 
		})
      
	</script>





<!--	
	<div class="row-fluid" id="footer">	
		<div class="span5 offset5">				
			<p>2015-2016慕课网</p>				
		</div>			
    </div>
-->
	<!--
<script type="text/javascript">

 

$(".leftsidebar_box dt").css({"background-color":"#3992d0"});
$(".leftsidebar_box dt img").attr("src","/AP1/Public/images/left/select_xl01.png");
$(function(){
	$(".leftsidebar_box dd").hide();
	$(".leftsidebar_box dt").click(function(){
		$(".leftsidebar_box dt").css({"background-color":"#3992d0"})
		$(this).css({"background-color": "#317eb4"});
		$(this).parent().find('dd').removeClass("menu_chioce");
		$(".leftsidebar_box dt img").attr("src","/AP1/Public/images/left/select_xl01.png");
		$(this).parent().find('img').attr("src","/AP1/Public/images/left/select_xl.png");
		$(".menu_chioce").slideUp(); 
		$(this).parent().find('dd').slideToggle();
		$(this).parent().find('dd').addClass("menu_chioce");
	});
})
</script>

-->
    

</body>
</html>