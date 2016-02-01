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




<link rel="stylesheet" type="text/css" href="/AP1/Public/css前台/about/a.css" />
<div id="main">

<div class="container clearfix">
    <ul class="other-left l">
      <li >
        <a href="<?php echo U('us');?>"><span>关于我们</span></a>
      </li>
      <li class="selected">
        <a href="<?php echo U('group');?>"><span>团队介绍</span></a>
      </li>
      <li>
         <a href="<?php echo U('job');?>"><span>人才招聘</span></a>
      </li>
      <li>
        <a href="<?php echo U('teacher');?>"><span>讲师招募</span></a>
      </li>
      <li>
        <a href="<?php echo U('contact');?>"><span>联系我们</span></a>
      </li>
      <li>
        <a no-pjajx="" href="<?php echo U('suggest');?>"><span>意见反馈</span></a>
      </li>
      <li>
        <a no-pjajx="" href="<?php echo U('friendly');?>"><span>友情链接</span></a>
      </li>
  </ul>
  <div class="other-right ">
        <div class="other-right-wrap" >
          <div id="pjax-tiper" class="alert" style="display:none">正在加载...</div>
  <div id="pjax-container">


    <div class="group">
  <div class="group-hd" style='position:relative'>
    <img class="group-img" src="/AP1/Public/img前台/aboutus/usimg.jpg" alt="爱慕课,iMooc" />
    <div style="position: absolute; right: 17px; top: 17px;">
    </div>
  </div>
  <div class="group-bd clearfix">
    <!-- the first group from 01-08 -->
    <ol class="order-list item1">
              <li data-id="1">
          <div class="wrap">
                        <div class="layer-title bg-opacity bg-red"><span>我为有这样的团队而骄傲，慕课网，大有所为！</span></div>
            <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_01.jpg" alt="" />
                      </div>
        </li>
              <li data-id="2">
          <div class="wrap">
                        <div class="layer-title bg-opacity bg-red"><span>技术改变生活！</span></div>
            <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_02.jpg" alt="" />
                      </div>
        </li>
              <li data-id="3">
          <div class="wrap">
                        <div class="layer-title bg-opacity bg-red"><span>男生节收到女生送的恐龙蛋，老开心了！怎么形容我们呢，互联网精神？屌丝？有情怀？有爱？好吧，我不知道，说多了又会被喷。。</span></div>
            <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_03.jpg" alt="" />
                      </div>
        </li>
              <li data-id="4">
          <div class="wrap">
                        <div class="layer-title bg-opacity bg-red"><span>看到用户对我们的认可，我坚信我们所有的努力是值得的，用心做好内容，做业界良心课程！</span></div>
            <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_04.jpg" alt="" />
                      </div>
        </li>
              <li data-id="5">
          <div class="wrap">
                        <div class="layer-title bg-opacity bg-red"><span>希望有更多的人认识慕课网，多年以后，如果有一帮牛X的程序员说，我在慕课网学习过，那我们现在所做的一切就值了</span></div>
            <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_05.jpg" alt="" />
                      </div>
        </li>
              <li data-id="6">
          <div class="wrap">
                        <div class="layer-title bg-opacity bg-red"><span>码农皆知的慕课网，仍有许多你不知道的事，我能随便告诉你我在这儿如此开心吗？</span></div>
            <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_06.jpg" alt="" />
                      </div>
        </li>
              <li data-id="7">
          <div class="wrap">
                        <div class="layer-title bg-opacity bg-red"><span>能为慕课网的成长壮大尽一份力，我很开心！能让慕课网受到众多用户的喜爱，我很自豪！我会继续努力!
  </span></div>
            <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_07.jpg" alt="" />
                      </div>
        </li>
              <li data-id="8">
          <div class="wrap">
                        <a href="/about/job" target="_blank">
              <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_08.jpg" alt="" />
            </a>
                      </div>
        </li>
          </ol>
    <!-- the second group from 09-10 -->
    <ol class="order-list item2">
                      <li data-id="9">
              <div class="wrap equi-square">
                <div class="layer-title bg-opacity bg-red"><span>每天很快乐的做着一件很牛很酷的事，不要小看这件事，说它牛，它就牛。说不定它将颠覆一个行业，引起8级地震！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_09.jpg" alt="" />
              </div>
            </li>
                      <li data-id="11">
              <div class="wrap mid-equi-square">
                <div class="layer-title bg-opacity bg-red"><span>工作中的好同事，生活中的好朋友。在慕课网，收获的不仅是一份工作经验，更有关乎青春的友情亲情</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_11.jpg" alt="" />
              </div>
            </li>
                      <li data-id="10">
              <div class="speci-wrap ">
                <div class="layer-title bg-opacity bg-red"><span>当得知APP被苹果推荐的那一刻，内心久久不能平静，彻夜无眠，我在不断的思考如何让慕课App成为随身学习的重要工具 ，肩负重任我们稳步向前！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_10.jpg" alt="" />
              </div>
            </li>
                  </ol>
        <!-- the third group from 11-56 -->
        <ol class="order-list item1">
                      <li data-id="13">
              <div class="wrap ">
                <div class="layer-title bg-opacity blue"><span>我是小花，谢谢慕课给了我一个学习和成长的实习机会，给了我一个这么完美的暑假，给了我一个学习机会，给了我一段这么美好的回忆！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_13.jpg" alt="" />
              </div>
            </li>
                      <li data-id="14">
              <div class="wrap ">
                <div class="layer-title bg-opacity blue"><span>喜欢挑战，更喜欢征服；喜欢高效，更享受速度。</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_14.jpg" alt="" />
              </div>
            </li>
                      <li data-id="15">
              <div class="wrap ">
                <div class="layer-title bg-opacity blue"><span>来到慕课网，除了每天做自己喜欢做的工作，还有幸成为了讲师，我希望通过和小伙伴的努力，让慕课网腾飞，让更多的同学更加便利的获得教育资源，加油！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_15.jpg" alt="" />
              </div>
            </li>
                      <li data-id="16">
              <div class="wrap ">
                <div class="layer-title bg-opacity blue"><span>我对幸福的理解是，白天有我喜欢的工作，晚上有可爱的你们</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_16.jpg" alt="" />
              </div>
            </li>
                      <li data-id="17">
              <div class="wrap ">
                <div class="layer-title bg-opacity blue"><span>我和我的喵咪，它很乖</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_17.jpg" alt="" />
              </div>
            </li>
                      <li data-id="18">
              <div class="speci-wrap wider-equi-square">
                <div class="layer-title bg-opacity blue"><span>梦想还是要有的，万一实现了呢</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_18.jpg" alt="" />
              </div>
            </li>
                      <li data-id="19">
              <div class="wrap ">
                <div class="layer-title bg-opacity blue"><span>对面的女孩看过来，看过来，看过来！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_19.jpg" alt="" />
              </div>
            </li>
                      <li data-id="20">
              <div class="wrap ">
                <div class="layer-title bg-opacity blue"><span>我行，因为我相信我行！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_20.jpg" alt="" />
              </div>
            </li>
                      <li data-id="21">
              <div class="wrap ">
                <div class="layer-title bg-opacity blue"><span>我是达达，我是大家的大内总管，很高兴和这样逗逼的一群人在一起，祝福慕课网所有同学，也祝慕课网越来越好！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_21.jpg" alt="" />
              </div>
            </li>
                      <li data-id="22">
              <div class="wrap ">
                <div class="layer-title bg-opacity blue"><span>我是寿星，要不要过个生日搞的这么凶残</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_22.jpg" alt="" />
              </div>
            </li>
                      <li data-id="23">
              <div class="wrap ">
                <div class="layer-title bg-opacity blue"><span>我是川妹子，辣妹子从小不怕辣。小伙伴们喜欢我的辛辣测试，更喜欢我的辣酱，哈哈。。</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_23.jpg" alt="" />
              </div>
            </li>
                      <li data-id="24">
              <div class="wrap ">
                <div class="layer-title bg-opacity blue"><span>小施主，你就从了贫僧吧，我等码农，钱多事少死得早，关键还会对你好</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_24.jpg" alt="" />
              </div>
            </li>
                      <li data-id="25">
              <div class="wrap ">
                <div class="layer-title bg-opacity blue"><span>我和小慕慕的亲密合影，啦啦啦</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_25.jpg" alt="" />
              </div>
            </li>
                      <li data-id="26">
              <div class="wrap ">
                <div class="layer-title bg-opacity purple"><span>别说我卖萌，天生大小眼，大眼看天，小眼看地，这样的人生才靠谱</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_26.jpg" alt="" />
              </div>
            </li>
                      <li data-id="27">
              <div class="wrap ">
                <div class="layer-title bg-opacity purple"><span>看到慕课网用户蹭蹭的长，老开心了</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_27.jpg" alt="" />
              </div>
            </li>
                      <li data-id="28">
              <div class="wrap ">
                <div class="layer-title bg-opacity purple"><span>我是吃货小分队队长，小伙伴们，我先试吃，好吃了，你们立马杀过来！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_28.jpg" alt="" />
              </div>
            </li>
                      <li data-id="29">
              <div class="wrap ">
                <div class="layer-title bg-opacity purple"><span>岁月静好，似水流年，认真的女孩最美丽</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_29.jpg" alt="" />
              </div>
            </li>
                      <li data-id="30">
              <div class="wrap ">
                <div class="layer-title bg-opacity purple"><span>哥是有家室的人了，妹子们，你们死心吧，不用惦记我了</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_30.jpg" alt="" />
              </div>
            </li>
                      <li data-id="31">
              <div class="speci-wrap ">
                <div class="layer-title bg-opacity purple"><span>慕课网诚聘讲师哦，每每想到自己正在做一件改变中国教育的事，心里就好激动啊，顿时觉得自己高大上起来！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_31.jpg" alt="" />
              </div>
            </li>
                      <li data-id="32">
              <div class="wrap ">
                <div class="layer-title bg-opacity purple"><span>和一群怪叔叔工作，好带劲！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_32.jpg" alt="" />
              </div>
            </li>
                      <li data-id="33">
              <div class="wrap ">
                <div class="layer-title bg-opacity purple"><span>愿用我的代码，码出慕课明天！希望慕课网能给更多热爱技术的同学带来便利！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_33.jpg" alt="" />
              </div>
            </li>
                      <li data-id="34">
              <div class="wrap ">
                <div class="layer-title bg-opacity purple"><span>天马星空的时候，才发现回家的路，心中盛开着白莲花，永不凋谢。</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_34.jpg" alt="" />
              </div>
            </li>
                      <li data-id="35">
              <div class="wrap ">
                <div class="layer-title bg-opacity purple"><span>背上背包去旅行，享受生活，享受当下！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_35.jpg" alt="" />
              </div>
            </li>
                      <li data-id="36">
              <div class="wrap ">
                <div class="layer-title bg-opacity purple"><span>学习是一场自我蜕变的伟大修行，贯穿生命的开始与结束。</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_36.jpg" alt="" />
              </div>
            </li>
                      <li data-id="37">
              <div class="wrap ">
                <div class="layer-title bg-opacity purple"><span>喜欢万物复苏的春天，喜欢柳树的嫩黄芽。</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_37.jpg" alt="" />
              </div>
            </li>
                      <li data-id="38">
              <div class="speci-wrap wider-equi-square">
                <div class="layer-title bg-opacity purple"><span>白龙马，蹄朝西，驮着唐三藏跟着三徒弟</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_38.jpg" alt="" />
              </div>
            </li>
                      <li data-id="39">
              <div class="wrap ">
                <div class="layer-title bg-opacity bg-red"><span>哥就是如此霸气</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_39.jpg" alt="" />
              </div>
            </li>
                      <li data-id="40">
              <div class="wrap ">
                <div class="layer-title bg-opacity bg-red"><span>享受优雅美好的生活！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_40.jpg" alt="" />
              </div>
            </li>
                      <li data-id="41">
              <div class="wrap ">
                <div class="layer-title bg-opacity bg-red"><span>帅的一塌糊涂，帅的掉渣</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_41.jpg" alt="" />
              </div>
            </li>
                      <li data-id="42">
              <div class="wrap ">
                <div class="layer-title bg-opacity bg-red"><span>在前进的道路上曲折地行进着，对，我是悟空！敢于叛经离道，敢于发出自己的声音，坚持自己！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_42.jpg" alt="" />
              </div>
            </li>
                      <li data-id="43">
              <div class="wrap ">
                <div class="layer-title bg-opacity bg-red"><span>身在帝都，胸装大梦想，每天为自己加油！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_43.jpg" alt="" />
              </div>
            </li>
                      <li data-id="44">
              <div class="wrap ">
                <div class="layer-title bg-opacity bg-red"><span>我愿用自己的画笔，给慕课网添一抹亮丽的色彩</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_44.jpg" alt="" />
              </div>
            </li>
                      <li data-id="45">
              <div class="wrap ">
                <div class="layer-title bg-opacity bg-red"><span>人们都说爱笑的女生运气不会太差，每天微笑的制作每一节课程，解决用户的每一个学习问题，希望好运常伴！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_45.jpg" alt="" />
              </div>
            </li>
                      <li data-id="46">
              <div class="wrap ">
                <div class="layer-title bg-opacity bg-red"><span>我在遥望，月亮之上！2014，爱生活，爱慕课。</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_46.jpg" alt="" />
              </div>
            </li>
                      <li data-id="47">
              <div class="wrap mid-equi-square">
                <div class="layer-title bg-opacity bg-red"><span>好基友，口对口，你一口，我一口！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_47.jpg" alt="" />
              </div>
            </li>
                      <li data-id="48">
              <div class="wrap ">
                <div class="layer-title bg-opacity bg-red"><span>哥在步入屌丝队列前也文艺过，怀念一下。。。</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_48.jpg" alt="" />
              </div>
            </li>
                      <li data-id="49">
              <div class="wrap ">
                <div class="layer-title bg-opacity bg-red"><span>会当凌绝顶，一览众山小，方显我侠女气概！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_49.jpg" alt="" />
              </div>
            </li>
                      <li data-id="50">
              <div class="wrap ">
                <div class="layer-title bg-opacity bg-red"><span>海龟欧巴，我还是比较适应中国的地沟油，回国后我又恢复了婴儿肥。。。</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_50.jpg" alt="" />
              </div>
            </li>
                      <li data-id="51">
              <div class="wrap ">
                <div class="layer-title bg-opacity bg-red"><span>柔顺的人总有一颗柔顺的心，看我的小绵羊头多柔顺，哇咔咔。。</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_51.jpg" alt="" />
              </div>
            </li>
                      <li data-id="52">
              <div class="wrap ">
                <div class="layer-title bg-opacity bg-red"><span>历尽山水，唯望妻儿安康！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_52.jpg" alt="" />
              </div>
            </li>
                      <li data-id="53">
              <div class="wrap mid-equi-square">
                <div class="layer-title bg-opacity bg-red"><span>我爱我的家，儿子女儿亲爱的她。。。。我闺女这么漂亮，多随我，偷乐！</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_53.jpg" alt="" />
              </div>
            </li>
                      <li data-id="54">
              <div class="speci-wrap ">
                <div class="layer-title bg-opacity bg-red"><span>我叫尔康，寻找大明湖畔的夏雨荷，那是我丈母娘，我想问她：我的紫薇在哪。。。。。。。</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_54.jpg" alt="" />
              </div>
            </li>
                      <li data-id="55">
              <div class="wrap ">
                <div class="layer-title bg-opacity bg-red"><span>每天一包猴头菇饼干，一包舒化奶，妈妈再也不用担心我营养不良了。。。。。。</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_55.jpg" alt="" />
              </div>
            </li>
                      <li data-id="56">
              <div class="wrap ">
                <div class="layer-title bg-opacity bg-red"><span>每天和慕课女神坐在一起，想想还有点小激动呢。</span></div>
                <img class="img" src="/AP1/Public/img前台/aboutus/ourgroup_56.jpg" alt="" />
              </div>
            </li>
                  </ol>
  </div>
</div>


          </div>
        </div>
    </div>
</div>

</div>



<script>

  
    $("#pjax-container").delegate(".wrap,.speci-wrap","mouseenter",function(){
        if(!$(this).hasClass("hover"))
        {
            $(this).addClass("hover")
        }
    }).delegate(".wrap,.speci-wrap","mouseleave",function(){
        if($(this).hasClass("hover")){
            $(this).removeClass("hover");
        }
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