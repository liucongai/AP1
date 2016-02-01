<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
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
        <div id="pad-wrapper" class="users-list">

            <ul class="breadcrumb" style="margin:-40px 0 50px 0">
                <li><a href="<?php echo U('Lesson/index');?>">Lesson</a> <span class="divider">/</span></li>
                <li class="active">Lesson_list</li>
            </ul>



            <div class="pull-right">

                <form class="form-search fr" action="" method="get">
                    <div class="input-append">
                        <input type="text" name="name" class="span2 search-query" placeholder="Name">
                        <button type="submit" class="btn"><i class="icon-search"></i>搜索</button>
                    </div>
                </form>

            </div>
            <!--
            </div>
            -->
            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="span2 sortable">
                            ID
                        </th>
                        <th class="span4 sortable">
                            <span class="line"></span>Name
                        </th>

                        <th class="span2 sortable">
                            <span class="line"></span>Nandu
                        </th>
                        <th class="span2 sortable">
                            <span class="line"></span>User_id
                        </th>
                        <th class="span2 sortable">
                            <span class="line"></span>Cate_id
                        </th>

                        <th class="span2 sortable">
                            <span class="line"></span>Time
                        </th>
                        <th class="span2 sortable">
                            <span class="line"></span>Hot
                        </th>

                        <th class="span2 sortable">
                            <span class="line"></span>state
                        </th>

                        <th class="span9 sortable align-right">
                            <span class="line"></span>Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- row -->
                    <?php if(!empty($list)): if(is_array($list)): foreach($list as $key=>$val): ?><tr>
                                <td><?php echo ($val["id"]); ?></td>
                                <td><?php echo ($val["lesson"]); ?></td>

                                <td><a href="<?php echo U('nandu?id='.$val[id].'&nandu='.$val[nandu]);?>"><?php echo ($val["nandu"]); ?></a></td>
                                <td><?php echo ($val["user_id"]); ?></td>
                                <td><?php echo ($val["cate_id"]); ?></td>
                                <td><a href="<?php echo U('is_new?id='.$val[id].'&is_new='.$val[is_new]);?>"><?php echo ($val["time"]); ?></a></td>
                                <td><a href="<?php echo U('is_hot?id='.$val[id].'&is_hot='.$val[is_hot]);?>"><?php echo ($val["hot"]); ?></a></td>
                                <td><a href="<?php echo U('state?id='.$val[id].'&state='.$val[state]);?>"><?php echo ($val["state"]); ?></a></td>

                                <td class="align-right" style="position: relative">
                                    <a href="<?php echo U('del',array('id'=>$val['id']));?>">删除</a>
                                    <a href="<?php echo U('edit',array('id'=>$val['id']));?>">编辑</a>
                                    <a class="btn btn-success" onclick="kuang(this)">加入计划</a>
                                    <a class="btn btn-success" onclick="kuang2(this)">加入分享</a>

                                    <div class="kuang" style="display: none;position: absolute;border: 1px solid #44A8F8;
                                    top:-20px;right: 180px;z-index:5000;width:300px;height:300px; padding: 10px;border-radius: 5px;
                                    background: white">
                                        <form class="new_user_form inline-input" action="<?php echo U('addplan?id='.$val['id']);?>" method="post">

                                            <div style="margin: 10px 0 " class="span12 field-box pos1">
                                                <label style="width: 100px;float: left;margin:5px 10px ;">Plan-1-list:</label>
                                                　　<div class="ui-select span5">
                                                    <select class="mysel"  onchange="pl_change(this)">
                                                        <option value="0" />--choose--

                                                        <?php if(is_array($pl_list)): foreach($pl_list as $key=>$sval): ?><option value="<?php echo ($sval["id"]); ?>"><?php echo ($sval["name"]); ?></option><?php endforeach; endif; ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div style="margin: 10px 0 " class="span12 field-box pos2">
                                                <label style="width: 100px;float: left;margin:5px 10px ;">Plan-2-list:</label>
                                                <div class="ui-select span5" id="add2">
                                                    <select onchange="pl2_change(this)">
                                                        <option class="ccx2" value="0">--choose--</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div style="margin:10px 0" class="span12 field-box">
                                                <label style="width: 100px;float: left;margin:5px 10px ;">Plan-3-list:</label>
                                                <div class="ui-select span5" id="add3">
                                                    <select name="pp_id">
                                                        <option class="ccx3" value="0">--choose--</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div style="margin-top:70px " class="span11 field-box actions">
                                                <input type="submit" class="btn-glow primary" value="Create New" />
                                                <span>OR</span>
                                                <input type="reset" value="Cancel" onclick="cance()"/>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="kuang2" style="display: none;position: absolute;border: 1px solid #44A8F8;
                                    top:-20px;right: 180px;z-index:5000;width:300px;height:200px; padding: 10px;border-radius: 5px;
                                    background: white">
                                        <form class="new_user_form inline-input" action="<?php echo U('addshare?id='.$val['id']);?>" method="post">

                                            <div style="margin: 10px 0 " class="span12 field-box pos1">
                                                <label style="width: 100px;float: left;margin:5px 10px ;">List:</label>
                                                　　<div class="ui-select span5">
                                                <select  name="share">
                                                    <option value="0" />--choose--

                                                    <?php if(is_array($sh_list)): foreach($sh_list as $key=>$vol): ?><option value="<?php echo ($vol["id"]); ?>"><?php echo ($vol["name"]); ?></option><?php endforeach; endif; ?>

                                                </select>
                                            </div>
                                            </div>

                                            <div style="margin-top:70px " class="span11 field-box actions">
                                                <input type="submit" class="btn-glow primary" value="Create New" />
                                                <span>OR</span>
                                                <input type="reset" value="Cancel" onclick="cance()"/>
                                            </div>
                                        </form>
                                    </div>

                                </td>
                            </tr><?php endforeach; endif; ?>

                        <?php else: ?>
                        <tr>
                            <td colspan="6">查无数据</td>
                        </tr><?php endif; ?>

                    </tbody>

                </table>

            </div>




            <div class="pagination">
                <ul>
                    <?php echo ($pageButton); ?>
                </ul>
            </div>
            <script>
                function kuang(ob){
                    $('.kuang').css('display','none');
                    $('.kuang2').css('display','none');
                    $(ob).next().next().css('display','block');
                }
                function kuang2(ob){
                    $('.kuang2').css('display','none');
                    $('.kuang').css('display','none');
                    $(ob).next().next().css('display','block');
                }
                function cance(){
                    $('.kuang').css('display','none');
                    $('.kuang2').css('display','none');
                }

                function pl_change(ob){
                    $(ob).closest('.pos1').next().find('.ccx2').siblings().remove('.opa');
                    //$(ob).closest('.pos1').next().children().css('background-color', 'red');
                    $.get('<?php echo U("pl_ajaxName");?>',{id:ob.value},function(result){
                        console.dir($(result));
                        $.each(result,function(i,val){
                            $(ob).closest('.pos1').next().find('.ccx2').after('<option class="opa"  value="' + val['id'] + '">'+ val['name'] +'</option>');
                        });

                    });
                }

                function pl2_change(ob){
                    $(ob).closest('.pos2').next().find('.ccx3').siblings().remove('.opa');
                    $.get('<?php echo U("pl2_ajaxName");?>',{id:ob.value},function(result){
                        console.dir($(result));
                        $.each(result,function(i,val){
                            $(ob).closest('.pos2').next().find('.ccx3').after('<option class="opa"  value="' + val['id'] + '">'+ val['name'] +'</option>');
                        });

                    });
                }

                $('.pagination ul a').unwrap('div').wrap('<li></li>');
                $('.pagination ul span').wrap('<li class="active"></li>');
            </script>
            <!-- end users table -->
        </div>
    </div>
</div>
<!-- end main container -->








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