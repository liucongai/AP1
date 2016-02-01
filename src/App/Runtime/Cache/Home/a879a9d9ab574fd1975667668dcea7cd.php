<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0032)http://www.imooc.com/video/10396 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta property="qc:admins" content="77103107776553571676375">
    <meta property="wb:webmaster" content="c4f857219bfae3cb">


    <title>vertical-align家族基本认识-慕课网</title>

    <script type="text/javascript" src="/AP1/Public/js/jquery-1.9.1.js"></script>
    <link rel="stylesheet" type="text/css" href="/AP1/Public/css/layer.css" />
    <link rel="stylesheet" type="text/css" href="/AP1/Public/css/saved_resource_vid.css" />

<body>

<div id="header" class="course-detail-header">
    <div class="cd-inner clearfix">
        <ul class="l">
            <li class="nv nv-goback"><a href="http://www.imooc.com/learn/542" class="revert l"><i class="icon icon-left"></i></a></li>
            <li class="nv nv-menu">
                <a href="javascript:;" class="chaptername J-chaptername" data-id="10396" style="cursor:text;"><span><?php echo ($le_na); ?></span><em><?php echo ($xi_na); ?></em></a>
            </li>

        </ul>
        <ul class="r course-nv-right">

            <li class="nvr">
                <a href="http://www.imooc.com/message" class="nvr-msg" title="我的消息" target="_blank">
                    <i class="icon icon-msg"></i>
                    <span class="msg_icon" style="display:none"></span>
                </a>
            </li>
            <li class="nvr user-card-box">
                <a href="http://www.imooc.com/space/index" action-type="my_menu" class="nvr-space user-card-item" id="js-user-avatar">
                    <img src="/AP1/Uploads/<?php echo ($_SESSION['home']['img']); ?>" width="40" height="40">
                    <i class="myspace_remind" style="display: none;"></i>
                    <span style="display: none;">动态提醒</span>
                </a>

            </li>
        </ul>
    </div>
</div>

<div id="studyMain">


    <div id="bgarea" class="video-con">
        <div class="js-box-wrap" style="width: 100%; height: 499px;">
            <div id="J_Box" class="course-video-box">
                <div id="video-box_wrapper" style="position: relative; display: block; width: 100%; height: 100%;"><a id="beforeswfanchor0" href="http://www.imooc.com/video/10396#video-box" tabindex="0" title="Flash start" style="border:0;clip:rect(0 0 0 0);display:block;height:1px;margin:-1px;outline:none;overflow:hidden;padding:0;position:absolute;width:1px;" data-related-swf="video-box"></a>
                    <object type="video/mp4" data="/AP1/../mad.mp4" width="100%" height="100%" bgcolor="#000000" id="video-box" name="video-box" class="jwswf swfPrev-beforeswfanchor0 swfNext-afterswfanchor0" tabindex="0">
                        <param name="allowfullscreen" value="true"><param name="allowscriptaccess" value="always">
                        <param name="seamlesstabbing" value="true"><param name="wmode" value="opaque">
                    </object>
                    <a id="afterswfanchor0" href="http://www.imooc.com/video/10396#video-box" tabindex="0" title="Flash end" style="border:0;clip:rect(0 0 0 0);display:block;height:1px;margin:-1px;outline:none;overflow:hidden;padding:0;position:absolute;width:1px;" data-related-swf="video-box"></a>
                    <div id="video-box_aspect" style="display: none;"></div>
                </div>
                <div class="next-box J_next-box hide">
                    <div class="next-box-inner">
                        <div class="course-tip-layer J-next-course" data-next-src="/video/10397">
                            <h2>下一节课程： vertical-align起作用的前提
                                <span class="course-duration"> (14:10)</span>
                            </h2>
                            <div class="J-next-auto hide next-auto"><em>3</em> 秒后播放下一节</div>
                            <div class="J-next-btn hide btn btn-red">下一节</div>
                            <a href="http://www.imooc.com/video/10396/0" class="review-course">重新观看</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--此处结构为练习题，视频，编程公用的侧栏-->
       </div>

    <div class="maybe-wenda" id="maybe-wenda" style="display: none;">
        <i class="icon-chat"></i>
        <p class="text">你发的评论可能会是问题？<br>是否将他发到问答中</p>
        <input class="btn ok" type="button" value="好的" id="wenda-ok">
        <input class="btn no" type="button" value="不用" id="wenda-no">
    </div>
</div>


<div class="course-subcontainer clearfix">
    <div class="course-left">
        <ul class="course-menu course-video-menu clearfix js-course-menu" data-ower="all" data-sort="last" style="position: absolute; left: 0px;">
            <li class="course-menu-item"><a class="active" href="javascript:void(0)" id="plMenu">评论</a></li>
            <li class="course-menu-item"><a href="javascript:void(0)" id="qaMenu">问答</a></li>
        </ul>
        <div id="disArea" class="lists-container list-wrap">
            <div id="pl-content" class="list-tab-con">
                <form  action="<?php echo U('dolearn2');?>" method="get">
                <div class="publish clearfix" id="discus-publish">
                    <div class="publish-wrap publish-wrap-pl">
                        <div class="pl-input-wrap">
                            <div id="js-pl-input-fake" class="pl-input-inner">
                                <textarea id="js-pl-textarea" class="js-placeholder" placeholder="扯淡、吐槽、表扬、鼓励……想说啥就说啥！"></textarea>
                                <span class="num-limit"><span id="js-pl-limit">0</span>/300</span>
                                <p><input  type="hidden" name="zz_id" value="<?php echo ($comlist[0]['zz_id']); ?>" /></p>
                            </div>
                            <div class="pl-input-btm input-btm clearfix">
                                <div class="verify-code l"></div>
                                <input type="submit" id="js-pl-submit" class="r course-btn" value="发表评论">
                            </div>
                        </div>

                    </div>
                </div>
                </form>
                <div id="plLoadListData"><div class="pl-container"> 
                    <ul>  
                        <?php if(is_array($comlist)): foreach($comlist as $key=>$cval): ?><li class="pl-list clearfix"> 
                        <div class="pl-list-avator">
                            <a href="" target="_blank">
                                <img width="40" height="40" src="/AP1/Uploads/<?php echo ($cval['user_pic']); ?>" title="王者yao归来">
                            </a> 
                        </div> 
                        <div class="pl-list-main">
                            <div class="pl-list-nick">
                                <a href="" target="_blank"><?php echo ($cval['user_name']); ?></a> 
                            </div> <div class="pl-list-content"><?php echo ($cval['comment']); ?></div>  
                            <div class="pl-list-btm clearfix"> 
                                <span class="pl-list-time l">时间:<?php echo ($cval['time']); ?></span>  
                                <!--<a title="赞" href="javascript:;" class="js-pl-praise list-praise r" data-id="132040">
                                <i class="icon-thumb"></i>  -->
                                <span><?php echo ($key+1); ?></span>
                                </a> 
                            </div> 
                        </div> 
                        </li><?php endforeach; endif; ?> 
                    </ul>
                     <div class="page"><?php echo ($pageButton); ?></div>
            </div>
            <div class="page pl-list-page"></div></div>
            </div>
            <div id="qa-content" class="list-tab-con" style="display:none">
                <div id="qaLoadListData"><div class="sortlist"> 			<div class="ordertab"> 				<a href="javascript:void(0)" hidefocus="true" data-order="1" class="quealltab onactive">全部</a>				<a href="javascript:void(0)" hidefocus="true" data-order="2" class="quealltab ">精华</a>			</div>		</div><div class="answertabcon"></div><div class="page discuss-list-page"></div></div>
            </div>
            <div id="note-content" class="list-tab-con" style="display:none">
                <div id="noteLoadListData">
                    <div class="course-tool-bar clearfix js-select-state">			<div class="tool-left l js-all-state">		        <a href="javascript:;" class="sort-item active" data-sort="last">最新</a>		        <a href="javascript:;" class="sort-item" data-sort="sugg">点赞</a>		        <a href="javascript:;" class="sort-item" data-sort="coll">采集</a>	        </div>	        <div class="tool-right r">		        <span class="tool-item">		        	<a href="javascript:;" class="js-ower hide-learned tool-chk" data-sort="last">只看我的</a>		        </span>		    </div>		</div><div id="course_note" class="course_note"></div><div class="page note-list-page"></div></div>
            </div>
            <div id="wiki-content" class="list-tab-con" style="display:none;">
                <div id="wikiLoadListData">
                    <div id="course_wiki" class="course_wiki"></div><div class="page wiki-list-page"></div></div>
            </div>
            <div id="mate-content" class="list-tab-con" style="display:none;">
                <div id="mateLoadListData">
                    <div class="othterscode-container"></div><div class="page othterscode-list-page"></div></div>
            </div>

        </div>
    </div>
    <div class="course-right clearfix">
        <div class="classmate fl">
            <h3>你的同学<span><?php echo ($usernum); ?>人</span></h3>
            <div class="users_wrap">
                <div id="js-class-mate" class="users clearfix">
                    <?php if(is_array($tist)): foreach($tist as $key=>$vol): ?><a class="mate-avator" href="" target="_blank">
                            <img src="/AP1/Uploads/<?php echo ($vol["img"]); ?>" title="<?php echo ($vol["name"]); ?>">
                        </a><?php endforeach; endif; ?>
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
                        <li><a href="http://www.imooc.com/" target="_blank">网站首页</a></li>
                        <li><a href="http://www.imooc.com/about/job" target="_blank">人才招聘</a></li>
                        <li> <a href="http://www.imooc.com/about/contact" target="_blank">联系我们</a></li>
                        <!--<li><a href="/subject/html" target="_blank">专题页面</a></li>-->
                        <li><a href="http://daxue.imooc.com/" target="_blank">高校联盟</a></li>
                        <li><a href="http://www.imooc.com/about/us" target="_blank">关于我们</a></li>
                        <li> <a href="http://www.imooc.com/about/recruit" target="_blank">讲师招募</a></li>
                        <li> <a href="http://www.imooc.com/user/feedback" target="_blank">意见反馈</a></li>
                        <li> <a href="http://www.imooc.com/about/friendly" target="_blank">友情链接</a></li>
                    </ul>
                </div>
                <p>Copyright © 2015 imooc.com All Rights Reserved | 京ICP备 13046642号-2</p>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" charset="utf-8" src="./vertical-align家族基本认识-慕课网_files/ueditor.final.min.js"></script>

<script type="text/javascript" src="./vertical-align家族基本认识-慕课网_files/sea.js"></script>
<script type="text/javascript" src="./vertical-align家族基本认识-慕课网_files/sea_config.js"></script>
<script type="text/javascript">seajs.use("/static/page/"+OP_CONFIG.module+"/"+OP_CONFIG.page);</script>



<div style="display: none">
    <script type="text/javascript">
        var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
        document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Ff0cfcccd7b1393990c78efdeebff3968' type='text/javascript'%3E%3C/script%3E"));
    </script><script src="./vertical-align家族基本认识-慕课网_files/h.js" type="text/javascript"></script><a href="http://tongji.baidu.com/hm-web/welcome/ico?s=f0cfcccd7b1393990c78efdeebff3968" target="_blank"><img border="0" src="./vertical-align家族基本认识-慕课网_files/21.gif" width="20" height="20"></a>
</div>
<!--笔记弹出框-->
<div class="publish clearfix note-pop" id="note-publist">
    <div class="publish-wrap publish-wrap-note video-publish-note pop-con">
        <div class="pop-title">
            <h3>笔记</h3>
            <span class="icon-close"></span>
        </div>
        <div id="js-note-input-fake" class="textarea-wrap">
            <textarea data-maxlength="1000" id="js-note-textarea" class="js-placeholder" name="" placeholder="请输入笔记内容..."></textarea>
            <p class="note-text-counter"><span id="js-note-limit">0</span>/1000</p>
        </div>
        <div class="publish-note-btns input-btm clearfix pop-footer">
            <div class="verify-code clearfix"></div>
            <div title="截图" class="js-shot-video screen-btn" data-type="note">
                <span>截图</span>
            </div>
            <input type="button" title="发表" value="保存" id="js-note-submit" class="course-btn r">
            <label for="js-isshare" class="label-checked r"><input type="checkbox" checked="checked" id="js-isshare" class="checked"> 公开</label>
            <!-- <div class="integral-info">
                <span>本次提问将花费1个积分</span>
                <a target="_blank" href="/myclub/rule">什么是积分？</a>
            </div> -->
        </div>
    </div>
</div>
<!--问答弹出框 通用-->
<div class="publish clearfix qa-pop" id="discus-publish">
    <div class="publish-wrap publish-wrap-disucss video-publish-qa pop-con">
        <div class="pop-title">
            <h3>提问</h3>
            <span class="icon-close"></span>
        </div>
        <div class="qa-control-wrap clearfix">
            <div class="question-area">
                <div class="qa-control qa-ipt-title">
                    <input type="text" id="js-qa-title" maxlength="255" class=" js-placeholder autocomplete" placeholder="请输入问题标题">
                </div>
                <dl class="send-area-result">
                </dl>
            </div>
        </div>
        <div class="qa-control-wrap clearfix">
            <div class="qa-control">
                <div class="rich-text-editor">
                    <div id="discuss-editor" class="edui-imooc" style=""><div id="edui1" class="edui-editor  edui-imooc" style="width: 588px; z-index: 999;"><div id="edui1_toolbarbox" class="edui-editor-toolbarbox edui-imooc"><div id="edui1_toolbarboxouter" class="edui-editor-toolbarboxouter edui-imooc"><div class="edui-editor-toolbarboxinner edui-imooc"><div id="edui2" class="edui-toolbar   edui-imooc" onselectstart="return false;" onmousedown="return $EDITORUI[&quot;edui2&quot;]._onMouseDown(event, this);" style="-webkit-user-select: none;"><div id="edui3" class="edui-box edui-combox edui-for-insertcode edui-imooc"><div title="代码语言" id="edui3_state" onmousedown="$EDITORUI[&quot;edui3&quot;].Stateful_onMouseDown(event, this);" onmouseup="$EDITORUI[&quot;edui3&quot;].Stateful_onMouseUp(event, this);" onmouseover="$EDITORUI[&quot;edui3&quot;].Stateful_onMouseOver(event, this);" onmouseout="$EDITORUI[&quot;edui3&quot;].Stateful_onMouseOut(event, this);" class="edui-imooc"><div class="edui-combox-body edui-imooc"><div id="edui3_button_body" class="edui-box edui-button-body edui-imooc" onclick="$EDITORUI[&quot;edui3&quot;]._onButtonClick(event, this);">代码语言</div><div class="edui-box edui-splitborder edui-imooc"></div><div class="edui-box edui-arrow edui-imooc" onclick="$EDITORUI[&quot;edui3&quot;]._onArrowClick();"></div></div></div></div><div id="edui17" class="edui-box edui-button edui-for-bold edui-imooc"><div id="edui17_state" onmousedown="$EDITORUI[&quot;edui17&quot;].Stateful_onMouseDown(event, this);" onmouseup="$EDITORUI[&quot;edui17&quot;].Stateful_onMouseUp(event, this);" onmouseover="$EDITORUI[&quot;edui17&quot;].Stateful_onMouseOver(event, this);" onmouseout="$EDITORUI[&quot;edui17&quot;].Stateful_onMouseOut(event, this);" class="edui-imooc"><div class="edui-button-wrap edui-imooc"><div id="edui17_body" unselectable="on" title="加粗" class="edui-button-body edui-imooc" onmousedown="return $EDITORUI[&quot;edui17&quot;]._onMouseDown(event, this);" onclick="return $EDITORUI[&quot;edui17&quot;]._onClick(event, this);"><div class="edui-box edui-icon edui-imooc"></div></div></div></div></div><div id="edui18" class="edui-box edui-button edui-for-italic edui-imooc"><div id="edui18_state" onmousedown="$EDITORUI[&quot;edui18&quot;].Stateful_onMouseDown(event, this);" onmouseup="$EDITORUI[&quot;edui18&quot;].Stateful_onMouseUp(event, this);" onmouseover="$EDITORUI[&quot;edui18&quot;].Stateful_onMouseOver(event, this);" onmouseout="$EDITORUI[&quot;edui18&quot;].Stateful_onMouseOut(event, this);" class="edui-imooc"><div class="edui-button-wrap edui-imooc"><div id="edui18_body" unselectable="on" title="斜体" class="edui-button-body edui-imooc" onmousedown="return $EDITORUI[&quot;edui18&quot;]._onMouseDown(event, this);" onclick="return $EDITORUI[&quot;edui18&quot;]._onClick(event, this);"><div class="edui-box edui-icon edui-imooc"></div></div></div></div></div><div id="edui19" class="edui-box edui-button edui-for-underline edui-imooc"><div id="edui19_state" onmousedown="$EDITORUI[&quot;edui19&quot;].Stateful_onMouseDown(event, this);" onmouseup="$EDITORUI[&quot;edui19&quot;].Stateful_onMouseUp(event, this);" onmouseover="$EDITORUI[&quot;edui19&quot;].Stateful_onMouseOver(event, this);" onmouseout="$EDITORUI[&quot;edui19&quot;].Stateful_onMouseOut(event, this);" class="edui-imooc"><div class="edui-button-wrap edui-imooc"><div id="edui19_body" unselectable="on" title="下划线" class="edui-button-body edui-imooc" onmousedown="return $EDITORUI[&quot;edui19&quot;]._onMouseDown(event, this);" onclick="return $EDITORUI[&quot;edui19&quot;]._onClick(event, this);"><div class="edui-box edui-icon edui-imooc"></div></div></div></div></div><div id="edui26" class="edui-box edui-button edui-for-insertimage edui-imooc"><div id="edui26_state" onmousedown="$EDITORUI[&quot;edui26&quot;].Stateful_onMouseDown(event, this);" onmouseup="$EDITORUI[&quot;edui26&quot;].Stateful_onMouseUp(event, this);" onmouseover="$EDITORUI[&quot;edui26&quot;].Stateful_onMouseOver(event, this);" onmouseout="$EDITORUI[&quot;edui26&quot;].Stateful_onMouseOut(event, this);" class="edui-imooc"><div class="edui-button-wrap edui-imooc"><div id="edui26_body" unselectable="on" title="多图上传" class="edui-button-body edui-imooc" onmousedown="return $EDITORUI[&quot;edui26&quot;]._onMouseDown(event, this);" onclick="return $EDITORUI[&quot;edui26&quot;]._onClick(event, this);"><div class="edui-box edui-icon edui-imooc"></div><div class="edui-box edui-label edui-imooc"></div></div></div></div></div><div id="edui31" class="edui-box edui-button edui-for-link edui-imooc"><div id="edui31_state" onmousedown="$EDITORUI[&quot;edui31&quot;].Stateful_onMouseDown(event, this);" onmouseup="$EDITORUI[&quot;edui31&quot;].Stateful_onMouseUp(event, this);" onmouseover="$EDITORUI[&quot;edui31&quot;].Stateful_onMouseOver(event, this);" onmouseout="$EDITORUI[&quot;edui31&quot;].Stateful_onMouseOut(event, this);" class="edui-imooc"><div class="edui-button-wrap edui-imooc"><div id="edui31_body" unselectable="on" title="超链接" class="edui-button-body edui-imooc" onmousedown="return $EDITORUI[&quot;edui31&quot;]._onMouseDown(event, this);" onclick="return $EDITORUI[&quot;edui31&quot;]._onClick(event, this);"><div class="edui-box edui-icon edui-imooc"></div><div class="edui-box edui-label edui-imooc"></div></div></div></div></div><div id="edui32" class="edui-box edui-button edui-for-unlink edui-imooc"><div id="edui32_state" onmousedown="$EDITORUI[&quot;edui32&quot;].Stateful_onMouseDown(event, this);" onmouseup="$EDITORUI[&quot;edui32&quot;].Stateful_onMouseUp(event, this);" onmouseover="$EDITORUI[&quot;edui32&quot;].Stateful_onMouseOver(event, this);" onmouseout="$EDITORUI[&quot;edui32&quot;].Stateful_onMouseOut(event, this);" class="edui-imooc"><div class="edui-button-wrap edui-imooc"><div id="edui32_body" unselectable="on" title="取消链接" class="edui-button-body edui-imooc" onmousedown="return $EDITORUI[&quot;edui32&quot;]._onMouseDown(event, this);" onclick="return $EDITORUI[&quot;edui32&quot;]._onClick(event, this);"><div class="edui-box edui-icon edui-imooc"></div></div></div></div></div><div id="edui33" class="edui-box edui-button edui-for-insertunorderedlist edui-imooc"><div id="edui33_state" onmousedown="$EDITORUI[&quot;edui33&quot;].Stateful_onMouseDown(event, this);" onmouseup="$EDITORUI[&quot;edui33&quot;].Stateful_onMouseUp(event, this);" onmouseover="$EDITORUI[&quot;edui33&quot;].Stateful_onMouseOver(event, this);" onmouseout="$EDITORUI[&quot;edui33&quot;].Stateful_onMouseOut(event, this);" class="edui-imooc"><div class="edui-button-wrap edui-imooc"><div id="edui33_body" unselectable="on" title="无序列表" class="edui-button-body edui-imooc" onmousedown="return $EDITORUI[&quot;edui33&quot;]._onMouseDown(event, this);" onclick="return $EDITORUI[&quot;edui33&quot;]._onClick(event, this);"><div class="edui-box edui-icon edui-imooc"></div><div class="edui-box edui-label edui-imooc"></div></div></div></div></div><div id="edui34" class="edui-box edui-button edui-for-insertorderedlist edui-imooc"><div id="edui34_state" onmousedown="$EDITORUI[&quot;edui34&quot;].Stateful_onMouseDown(event, this);" onmouseup="$EDITORUI[&quot;edui34&quot;].Stateful_onMouseUp(event, this);" onmouseover="$EDITORUI[&quot;edui34&quot;].Stateful_onMouseOver(event, this);" onmouseout="$EDITORUI[&quot;edui34&quot;].Stateful_onMouseOut(event, this);" class="edui-imooc"><div class="edui-button-wrap edui-imooc"><div id="edui34_body" unselectable="on" title="有序列表" class="edui-button-body edui-imooc" onmousedown="return $EDITORUI[&quot;edui34&quot;]._onMouseDown(event, this);" onclick="return $EDITORUI[&quot;edui34&quot;]._onClick(event, this);"><div class="edui-box edui-icon edui-imooc"></div><div class="edui-box edui-label edui-imooc"></div></div></div></div></div><div id="edui35" class="edui-box edui-button edui-for-blockquote edui-imooc"><div id="edui35_state" onmousedown="$EDITORUI[&quot;edui35&quot;].Stateful_onMouseDown(event, this);" onmouseup="$EDITORUI[&quot;edui35&quot;].Stateful_onMouseUp(event, this);" onmouseover="$EDITORUI[&quot;edui35&quot;].Stateful_onMouseOver(event, this);" onmouseout="$EDITORUI[&quot;edui35&quot;].Stateful_onMouseOut(event, this);" class="edui-imooc"><div class="edui-button-wrap edui-imooc"><div id="edui35_body" unselectable="on" title="引用" class="edui-button-body edui-imooc" onmousedown="return $EDITORUI[&quot;edui35&quot;]._onMouseDown(event, this);" onclick="return $EDITORUI[&quot;edui35&quot;]._onClick(event, this);"><div class="edui-box edui-icon edui-imooc"></div></div></div></div></div><div id="edui36" class="edui-box edui-button edui-for-redo edui-imooc"><div id="edui36_state" onmousedown="$EDITORUI[&quot;edui36&quot;].Stateful_onMouseDown(event, this);" onmouseup="$EDITORUI[&quot;edui36&quot;].Stateful_onMouseUp(event, this);" onmouseover="$EDITORUI[&quot;edui36&quot;].Stateful_onMouseOver(event, this);" onmouseout="$EDITORUI[&quot;edui36&quot;].Stateful_onMouseOut(event, this);" class="edui-imooc"><div class="edui-button-wrap edui-imooc"><div id="edui36_body" unselectable="on" title="重做" class="edui-button-body edui-imooc" onmousedown="return $EDITORUI[&quot;edui36&quot;]._onMouseDown(event, this);" onclick="return $EDITORUI[&quot;edui36&quot;]._onClick(event, this);"><div class="edui-box edui-icon edui-imooc"></div></div></div></div></div><div id="edui37" class="edui-box edui-button edui-for-undo edui-imooc"><div id="edui37_state" onmousedown="$EDITORUI[&quot;edui37&quot;].Stateful_onMouseDown(event, this);" onmouseup="$EDITORUI[&quot;edui37&quot;].Stateful_onMouseUp(event, this);" onmouseover="$EDITORUI[&quot;edui37&quot;].Stateful_onMouseOver(event, this);" onmouseout="$EDITORUI[&quot;edui37&quot;].Stateful_onMouseOut(event, this);" class="edui-imooc"><div class="edui-button-wrap edui-imooc"><div id="edui37_body" unselectable="on" title="撤销" class="edui-button-body edui-imooc" onmousedown="return $EDITORUI[&quot;edui37&quot;]._onMouseDown(event, this);" onclick="return $EDITORUI[&quot;edui37&quot;]._onClick(event, this);"><div class="edui-box edui-icon edui-imooc"></div></div></div></div></div><div id="edui40" class="edui-box edui-button edui-for-preview edui-imooc"><div id="edui40_state" onmousedown="$EDITORUI[&quot;edui40&quot;].Stateful_onMouseDown(event, this);" onmouseup="$EDITORUI[&quot;edui40&quot;].Stateful_onMouseUp(event, this);" onmouseover="$EDITORUI[&quot;edui40&quot;].Stateful_onMouseOver(event, this);" onmouseout="$EDITORUI[&quot;edui40&quot;].Stateful_onMouseOut(event, this);" class="edui-imooc"><div class="edui-button-wrap edui-imooc"><div id="edui40_body" unselectable="on" title="预览" class="edui-button-body edui-imooc" onmousedown="return $EDITORUI[&quot;edui40&quot;]._onMouseDown(event, this);" onclick="return $EDITORUI[&quot;edui40&quot;]._onClick(event, this);"><div class="edui-box edui-icon edui-imooc"></div><div class="edui-box edui-label edui-imooc"></div></div></div></div></div></div></div></div><div id="edui1_toolbarmsg" class="edui-editor-toolbarmsg edui-imooc" style="display:none;"><div id="edui1_upload_dialog" class="edui-editor-toolbarmsg-upload edui-imooc" onclick="$EDITORUI[&quot;edui1&quot;].showWordImageDialog();">点击上传</div><div class="edui-editor-toolbarmsg-close edui-imooc" onclick="$EDITORUI[&quot;edui1&quot;].hideToolbarMsg();">x</div><div id="edui1_toolbarmsg_label" class="edui-editor-toolbarmsg-label edui-imooc"></div><div style="height:0;overflow:hidden;clear:both;" class="edui-imooc"></div></div><div id="edui1_message_holder" class="edui-editor-messageholder edui-imooc" style="top: 3px; z-index: 1000;"></div></div><div id="edui1_iframeholder" class="edui-editor-iframeholder edui-imooc" style="width: 588px; height: 150px; z-index: 999; overflow: hidden;"><iframe id="ueditor_0" width="100%" height="100%" frameborder="0" src="javascript:void(function(){document.open();document.write("<!DOCTYPE html><html xmlns='http://www.w3.org/1999/xhtml' class='view' ><head><style type='text/css'>.view{padding:0;word-wrap:break-word;cursor:text;height:90%;}
                    body{margin:8px;font-family:sans-serif;font-size:16px;}p{margin:5px 0;}</style><link rel='stylesheet' type='text/css' href='http://www.imooc.com/static/lib/ueditor/themes/iframe.css'/><style>p{line-height:1.5em;font-size:13px;color:#444}</style></head><body class='view' ></body><script type='text/javascript'  id='_initialScript'>setTimeout(function(){editor = window.parent.UE.instants['ueditorInstant0'];editor._setup(document);},0);var _tmpScript = document.getElementById('_initialScript');_tmpScript.parentNode.removeChild(_tmpScript);</script></html>");document.close();}())"></iframe></div><div id="edui1_bottombar" class="edui-editor-bottomContainer edui-imooc"><table class="edui-imooc"><tbody class="edui-imooc"><tr class="edui-imooc"><td id="edui1_elementpath" class="edui-editor-bottombar edui-imooc" style="display: none;"></td><td id="edui1_wordcount" class="edui-editor-wordcount edui-imooc" style="display: none;"></td><td id="edui1_scale" class="edui-editor-scale edui-imooc" style="display: none;"><div class="edui-editor-icon edui-imooc"></div></td></tr></tbody></table></div><div id="edui1_scalelayer" class="edui-imooc"></div></div></div><textarea style="display: none;">请输入讨论内容...</textarea>
                </div>
            </div>
        </div>
        <div id="js-discuss-btm" class="discuss-bottom input-btm clearfix pop-footer">
            <div class="verify-code clearfix"><input type="text" maxlength="4" class="verify-code-ipt" placeholder="请输入验证码"><img class="img-code" src="./vertical-align家族基本认识-慕课网_files/getcoursequestioncode"><span class="verify-code-around">看不清<br><i>换一换</i></span><span class="errtip"></span></div>
            <div title="截图" class="js-shot-video screen-btn" data-type="qa">
                <span>截图</span>
            </div>
            <input id="js-discuss-submit" class="r course-btn" type="button" value="发布">
        </div>
        <div id="use-credit-tip" class="use-credit-tip">
            <span class="credit-info">本次提问将花费2个积分</span>
            <a class="credit-rule" href="http://www.imooc.com/myclub/rule" target="_blank">为什么扣积分？</a>
        </div>
    </div>
</div>

<!--积分弹出框-->
<div class="integral-pop" id="no-credit">
    <div class="pop-con">
        <span class="icon-point"></span>
        <p>本次提问将花费2个积分</p>
        <p>你的积分不足，无法发表</p>
        <a class="integral-rule" href="http://www.imooc.com/myclub/rule" target="_blank">为什么扣积分？</a>
        <div class="ft clearfix">
            <a href="javascript:void(0)" class="btn btn-green l cancel-cf">确认</a>
            <a href="javascript:void(0)" class="btn btn-grey r cancel-cf">取消</a>
        </div>
    </div>
</div>
<div class="integral-pop" id="enough-credit">
    <div class="pop-con">
        <span class="icon-point"></span>
        <p>本次提问将花费2个积分</p>
        <p>继续发表请点击 "确定"</p>
        <a class="integral-rule" href="http://www.imooc.com/myclub/rule" target="_blank">为什么扣积分？</a>
        <div class="ft clearfix">
            <a id="interal-use" href="javascript:void(0)" class="btn btn-green l">确认</a>
            <a id="interal-cancel" href="javascript:void(0)" class="btn btn-grey r">取消</a>
        </div>
    </div>
</div>

<div id="video_mark" class="video_mark" style="display:none;"></div>
<!--<div class="fixed-video js-fixed-video">-->
<!--<h3>点击按住该条进行拖动</h3>-->
<!--<div class="fixed-video-con"></div>-->
<!--</div>-->
<!--
//此处结构在js里插入
<div class="animate-mp" style="left:50%;top:50%">-->
<!--<p class="mp"><i>+</i><span class="num">8</span>MP</p>-->
<!--<p class="desc">haha</p>-->
<!--</div>-->


<div id="edui_fixedlayer" class="edui-imooc" style="position: fixed; left: 0px; top: 0px; width: 0px; height: 0px;"><div id="edui41" class="edui-popup  edui-bubble edui-imooc" onmousedown="return false;" style="display: none;"> <div id="edui41_body" class="edui-popup-body edui-imooc"> <iframe style="position:absolute;z-index:-1;left:0;top:0;background-color: transparent;" frameborder="0" width="100%" height="100%" src="about:blank" class="edui-imooc"></iframe> <div class="edui-shadow edui-imooc"></div> <div id="edui41_content" class="edui-popup-content edui-imooc">  </div> </div></div></div><div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" style="position: absolute; left: 0px; top: -9999px; width: 1px; height: 1px; z-index: 999999999;"><a id="beforeswfanchor1" href="http://www.imooc.com/video/10396#global-zeroclipboard-flash-bridge" tabindex="0" title="Flash start" style="border:0;clip:rect(0 0 0 0);display:block;height:1px;margin:-1px;outline:none;overflow:hidden;padding:0;position:absolute;width:1px;" data-related-swf="global-zeroclipboard-flash-bridge"></a><object id="global-zeroclipboard-flash-bridge" name="global-zeroclipboard-flash-bridge" width="100%" height="100%" type="application/x-shockwave-flash" data="http://www.imooc.com/static/lib/ueditor/third-party/zeroclipboard/ZeroClipboard.swf?noCache=1447335944102" class=" swfPrev-beforeswfanchor1 swfNext-afterswfanchor1"><param name="allowScriptAccess" value="sameDomain"><param name="allowNetworking" value="all"><param name="menu" value="false"><param name="wmode" value="transparent"><param name="flashvars" value="trustedOrigins=www.imooc.com%2C%2F%2Fwww.imooc.com%2Chttp%3A%2F%2Fwww.imooc.com"></object><a id="afterswfanchor1" href="http://www.imooc.com/video/10396#global-zeroclipboard-flash-bridge" tabindex="0" title="Flash end" style="border:0;clip:rect(0 0 0 0);display:block;height:1px;margin:-1px;outline:none;overflow:hidden;padding:0;position:absolute;width:1px;" data-related-swf="global-zeroclipboard-flash-bridge"></a></div>
</body></html>