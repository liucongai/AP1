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



<link rel="stylesheet" type="text/css" href="/AP1/Public/css前台/about/a.css" />
<div id="main">

<div class="container clearfix">
    <ul class="other-left l">
      <li >
        <a href="<?php echo U('us');?>"><span>关于我们</span></a>
      </li>
      <li>
        <a href="<?php echo U('group');?>"><span>团队介绍</span></a>
      </li>
      <li class="selected"> 
         <a href="<?php echo U('job');?>"><span>人才招聘</span></a>
      </li>
      <li>
        <a href="<?php echo U('teacher');?>"><span>讲师招募</span></a>
      </li>
      <li>
        <a href="<?php echo U('contact');?>"><span>联系我们</span></a>
      </li>
      <li>
        <a no-pjajx="" href="<?php echo U('suggest1');?>"><span>意见反馈</span></a>
      </li>
      <li>
        <a no-pjajx="" href="<?php echo U('friendly');?>"><span>友情链接</span></a>
      </li>
    </ul>
    <div class="other-right ">
        <div class="other-right-wrap">
          <div id="pjax-tiper" class="alert" style="display:none">正在加载...</div>
          <div id="pjax-container">
            
<div class="others">
    <h1>人才招聘</h1>
    <div class="space-side">
        <ul class="perface">
            <li>亲，很高兴在这里与你相遇，能在这里找到我，说明你对小慕足够喜爱足够上心，多谢你的厚爱！</li>
            <li>小慕现在拿出最大诚意急寻合战友。自上线以来，慕课网受到广大程序员的各种喜爱，小慕除内心窃喜意外，深知自己肩上责任重大，<br>只有做出更好的课程，拿出更好的产品体验，才能对得起各位猿猿同学的喜爱。</li>
            <li>小慕虽不是富二代，但家底也算殷实，来到慕课网，我们绝不会亏待大家，不低于bat的待遇、五险一金、免费零食这些基本保障，大家都能享受到。<br>不过你这么有追求，相信你更看重我们年轻的活力，积极向上的精气神，以及想做一番事业的决心和勇气。</li>
            <li>寻找气息相投的小伙伴，一起mooc，一起改变中国教育！</li>
        </ul>
        <ul class="clearfix job-nav">
            <li><a href="<?php echo U('job');?>#product-center">产品中心</a></li>
            <li><a href="<?php echo U('job');?>#dev-center">研发中心</a></li>
            <li><a href="<?php echo U('job');?>#operate-center">运营中心</a></li>
            <li><a href="<?php echo U('job');?>#content-center">内容中心</a></li>
        </ul>

        <div id="product-center" class="works-wrap">
            <h2>产品中心</h2>
            <div class="job-block">
                <h3>社区产品经理</h3>
                <ol>
                    <li>-&nbsp;负责带领团队对用户需求、市场需求和业务需求进行调研分析，不断优化产品，提升产品质量，提高用户活跃度。 </li>
                    <li>-&nbsp;负责后台及社区产品的规划设计，负责项目的执行和效果评估以及后续改进工作</li>
                    <li>-&nbsp;带领团队完成产品策划工作，包括MRD、PRD撰写及部分交互设计工作；</li>
                    <li>-&nbsp;协助开发、测试团队理解和掌握需求，对产品需求方向和易用性负责；</li>
                    <li>-&nbsp;负责相关产品开发项目周期和进度把控，并对产品开发直至上线运营及项目完成进度和质量负责；</li>
                    <li>-&nbsp;负责跟踪产品上线后的产品运营，根据客户反馈进行产品优化改进</li>
                    <li>-&nbsp;关注业界动态，不断优化用户体验，及时制定产品的应变方案。</li>
                </ol>
                <h4>职位要求:</h4>
                <ol>
                    <li>-&nbsp;3年以上社区产品经验；</li>
                    <li>-&nbsp;有从原型设计到上线、运营的经验，曾独立负责过后台、广告、社区等产品原型设计和用户运营工作；</li>
                    <li>-&nbsp;熟悉WEB、WAP及HTML5产品设计规范，具备优秀的UE/UI的设计意识和表达能力；</li>
                    <li>-&nbsp;热爱互联网，关注用户体验，对新鲜事物敏感，对新型产品有自己的见解；</li>
                    <li>-&nbsp;具备较强的文字表现能力、PPT文案撰写能力、口头表达能力和学习能力； </li>
                    <li>-&nbsp;善用数据分析，收集用户意见反馈，持续优化产品；</li>
                    <li>-&nbsp;熟练运用Axure、VISIO、Mindmanage、PPT、等办公软件公软件。</li>
                </ol>
                <p class="job-email">简历请发送到:wubinhua@imooc.com 或 ada@imooc.com</p>

            </div>
            <div class="job-block">
                <h3>资深WUI/视觉设计师</h3>
                <ol>
                    <li>-&nbsp;负责公司整个产品线及相关的WUI及GUI界面及其它图形设计工作；</li>
                    <li>-&nbsp;根据产品原型完成产品的用户界面设计；</li>
                    <li>-&nbsp;三年以上交互设计经验；</li>
                    <li>-&nbsp;负责优化WUI和GUI的视觉交互流程，为用户提供更流畅的操作感觉；</li>
                    <li>-&nbsp;视觉设计规范和工作流程的设定；</li>
                </ol>
                <h4>职位要求:</h4>
                <ol>
                    <li>-&nbsp;精通设计类软件，有Web、App等用户界面的设计经验及作品；</li>
                    <li>-&nbsp;美术、平面设计、计算机等相关专业，学历不限；</li>
                    <li>-&nbsp;具有较高的艺术设计能力、审美观点，有三年以上UI界面设计工作经验，有完整的个人作品；</li>
                </ol>
                <p class="job-email">简历请发送到:wubinhua@imooc.com 或 ada@imooc.com</p>
            </div>
        </div>
        <div id="dev-center" class="works-wrap">
            <h2>研发中心</h2>
            <div id="web-mger" class="job-block">
                <h3>PHP高级开发工程师</h3>
                <ol>
                    <li>-&nbsp;设计规划教育社区视频类网站系统架构；</li>
                    <li>-&nbsp;核心应用或者模块实现；</li>
                    <li>-&nbsp;维护优化网站；</li>
                    <li>-&nbsp;对其它工程师进行技术指导；</li>
                </ol>
                <h4>职位要求:</h4>
                <ol>
                    <li>-&nbsp;熟悉linux，至少熟悉一种shell脚本语言(bash/perl/python等)；</li>
                    <li>-&nbsp;熟悉nginx/lighttpd/apache之一的配置和优化；</li>
                    <li>-&nbsp;本科以上学历，至少有2年以上php开发经验；</li>
                    <li>-&nbsp;熟悉mysql/postgresql/sqlserver数据库之一的开发与使用，熟悉memcached、redis的使用；</li>
                    <li>-&nbsp;有大访问量网站开发、规划经验优先；</li>
                    <li>-&nbsp;有视频播放、流媒体类网站研发维护经验优先；</li>
                    <li>-&nbsp;有linux环境下c/c++/java开发经验优先；</li>
                    <li>-&nbsp;工作热情、积极，易于沟通，能迅速融入团队，有一定抗压能力；</li>
                </ol>
                <p class="job-email">简历请发送到:wubinhua@imooc.com 或 ada@imooc.com</p>
            </div>
            <div class="job-block">
                <h3>前端高级开发工程师</h3>
                <ol>
                    <li>-&nbsp;负责教育社区类网站的前端框架、核心模块设计和实现；</li>
                    <li>-&nbsp;持续优化前端界面和脚本，保证兼容性和高性能；</li>
                    <li>-&nbsp;为团队内其它成员提供培训和指导。</li>
                </ol>
                <h4>职位要求：</h4>
                <ol>
                    <li>-&nbsp;2年以上互联网前端开发工作经验；</li>
                    <li>-&nbsp;熟悉html/js/css/html5/flash等开发；</li>
                    <li>-&nbsp;熟悉常用的1-2种ajax技术及框架（jquery/moontools/extjs/nodejs等）；</li>
                    <li>-&nbsp;熟悉原生JS编写；</li>
                    <li>-&nbsp;熟悉浏览器兼容技术、前端性能优化；</li>
                    <li>-&nbsp;良好的沟通能力和团队协作能力；</li>
                    <li>-&nbsp;善于学习，自我驱动，了解和学习业界新技术。</li>
                </ol>
                <p class="job-email">简历请发送到:wubinhua@imooc.com 或 ada@imooc.com</p>
            </div>
            <div class="job-block">
                <h3>iOS/Android开发工程师</h3>
                <ol>
                    <li>-&nbsp;负责社区、视频类ios/Android 产品开发优化维护；</li>
                    <li>-&nbsp;编写相应模块的设计文档，独立完成编码及单元测试；</li>
                    <li>-&nbsp;与团队成员充分、有效沟通协作，进行技术风险评估、项目时间评估；</li>
                    <li>-&nbsp;为团队内其它成员提供培训和指导；</li>
                </ol>
                <h4>职位要求：</h4>
                <ol>
                    <li>-&nbsp;熟悉掌握Objective-C 编程语言；或者熟悉java开发语言；</li>
                    <li>-&nbsp;熟悉iOS或Android ui、网络、数据库、xml/json解析等开发技巧；</li>
                    <li>-&nbsp;熟悉iOS或Android SDK及相关开发、调试、优化工具；</li>
                    <li>-&nbsp;至少有2年以上手机端app实际开发经验（iOS或Android平台）；</li>
                    <li>-&nbsp;有在app Store或Android应用市场发布过作品的优先；</li>
                    <li>-&nbsp;有视频/sns/社区/LBS等移动互联网产品开发经验者优先；</li>
                </ol>
                <p class="job-email">简历请发送到:wubinhua@imooc.com 或 ada@imooc.com</p>
            </div>
        </div>
        <div id="operate-center" class="works-wrap">
            <h2>运营中心</h2>
            <div class="job-block">
                <h3>高级运营专员（移动端）</h3>
                <ol>
                    <li>-&nbsp;负责慕课网客户端的渠道推广建设和合作运营，完成app产品的推广和运营KPI指标；</li>
                    <li>-&nbsp;拓展渠道合作伙伴，包括手机厂商、渠道商、第三方应用商店等推广渠道；</li>
                    <li>-&nbsp;推广渠道数据监控和反馈跟踪，对推广数据进行分析，有针对性的调整推广策略。 </li>
                </ol>
                <h4>职位要求:</h4>
                <ol>
                    <li>-&nbsp;了解教育市场，特别是网络教育平台的推广优先；</li>
                    <li>-&nbsp;优秀的语言表达和团队沟通能力；</li>
                    <li>-&nbsp;优秀的数据分析能力和严密的逻辑思维；</li>
                    <li>-&nbsp;具有很强的事业进取心与自我激励能力，能承受快速发展型企业带来的工作压力；</li>
                    <li>-&nbsp;2年以上客户端运营经验。</li>

                </ol>
                <p class="job-email">简历请发送到:wubinhua@imooc.com 或 ada@imooc.com</p>
            </div>
            <div class="job-block">
                <h3>资深网络推广</h3>
                <ol>
                    <li>-&nbsp;通过各媒体、渠道合作、提升网站流量和注册会员，完成KPI指标；</li>
                    <li>-&nbsp;负责慕课网相关的广告投放和后期数据分析、监测；</li>
                    <li>-&nbsp;根据慕课网推广计划负责拓展和维护合作伙伴关系；</li>
                    <li>-&nbsp;挖掘各媒体、渠道及运营的需求，深入挖掘并整合各</li>方优势资源；
                    <li>-&nbsp;负责所有合作上的跟进工作（包括合同拟定、合同接入、对接跟进、后期维护）。</li>
                </ol>
                <h4>职位要求:</h4>
                <ol>
                    <li>-&nbsp;2年以上业务拓展和网站推广或商务合作经验；</li>
                    <li>-&nbsp;充满激情、刻苦勤奋、独立开展工作能力强、悟性高、善于总结、能承受压力；</li>
                    <li>-&nbsp;具有在线教育网站或社区运营经验者优先；</li>
                    <li>-&nbsp;个人建站者，有站长经验者优先。</li>
                </ol>
                <p class="job-email">简历请发送到:wubinhua@imooc.com 或 ada@imooc.com</p>
            </div>
        </div>
        <div id="content-center" class="works-wrap">
            <h2>内容中心</h2>
            <div class="job-block">
                <h3>教学设计经理</h3>
                <ol>
                    <li>-&nbsp;调研用户的学习需求，搭建培训产品体系，设计具有前瞻性与实用性的课程；</li>
                    <li>-&nbsp;配合讲师完成课程一体化设计方案，包括教学内容、教学大纲、教学活动、考核方式等；</li>
                    <li>-&nbsp;根据用户学习需要，为授课内容提供合理建议；激发讲师灵感，策划新颖的授课方式；</li>
                    <li>-&nbsp;协调各部门共同配合完成课程开发，控制开发进度及质量，并对成果进行验收；</li>
                    <li>-&nbsp;负责主讲教师的招聘与绩效考核工作，有效完成师资库管理与优秀师资储备工作；</li>
                    <li>-&nbsp;持续跟踪教学产品的运营情况，配合讲师不断改进课程质量，提高培训效果。</li>
                </ol>
                <h4>职位要求:</h4>
                <ol>
                    <li>-&nbsp;热爱教育行业，本科以上学历；</li>
                    <li>-&nbsp;三年以上IT技能培训工作经验，负责过课程策划，课程研发到上线运营全流程；有一定的技术背景；</li>
                    <li>-&nbsp;懂用户，懂互联网；较强的产品管理及组织协调能力，沟通表达能力强，并具有团队合作力；</li>
                    <li>-&nbsp;能独立思考，具有创新的思维和意识，极强的责任心。思路清晰，踏实缜密。具有一定的抗压能力。</li>
                    <li>-&nbsp;具有一定的文字功底，熟练使用Mindmaneger、PPT等办公软件；</li>
                </ol>
                <p class="job-email">简历请发送到:wubinhua@imooc.com 或 ada@imooc.com</p>
            </div>

            <div class="job-block">
                <h3>讲师</h3>
                <ol>
                    <li>-&nbsp;根据用户的学习需求，设计开发更具有前瞻性与实用性的课程；完成课程一体化设计方案，包括教学内容、教学大纲、教学指南、教学活动等； </li>
                    <li>-&nbsp;按照教学计划要求，完成在线课程录制，优化改进； </li>
                    <li>-&nbsp;完善培训教辅材料、案例体系，制定课程考核标准，并建立题库； </li>
                    <li>-&nbsp;指导助教开展网上学习辅导活动，帮助助教提高专业教学能力。</li>
                </ol>
                <h4>职位要求</h4>
                <ol>
                    <li>-&nbsp;热爱教育行业，专科以上学历； </li>
                    <li>-&nbsp;具有PHP开发、Android开发、ios开发、python开发2年以上一线项目开发经验；2年以上讲师经验；</li>
                    <li>-&nbsp;技术控，语言表达流利，思路清晰，有独特的授课风格及表现力，注重理论联系实际，深入浅出； </li>
                    <li>-&nbsp;能独立完成教学资料的开发（题库、案例库）；具有较高的技术水平和丰富的项目开发经验; 懂用户学习心理，善于沟通； </li>
                    <li>-&nbsp;擅于学习，工作态度积极主动，对学员有极强的责任心；具有创新的思维和意识；具有一定的抗压能力；</li>
                    <li>-&nbsp;熟练使用Mindmaneger、PPT等办公软件。</li>
                </ol>
                <p class="job-email">简历请发送到:wubinhua@imooc.com 或 ada@imooc.com</p>
            </div>
        </div>
    </div>
</div>


          </div>
        </div>
    </div>
</div>

</div>

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