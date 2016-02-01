<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
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
    <link rel="stylesheet" type="text/css" href="/AP1/Public/css/actadd.css" />
</head>
<body>
    
    <div class="main">
        <div class="ww">
        

		<div class="article-left">
            <h4>发布活动</h4>
			
			<form action="<?php echo U(doadd);?>" method="post" enctype="multipart/form-data">
                                <div class="art-title">
                    <span class="allred">*</span>
                    <span >标题:</span>
                
                <input type="text" id="title" class="form-control title" name="title" placeholder="请输入问题标题" maxlength="253" />
                </div>
                <p id="errortip"></p>
                

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
                        $('.showpic').append('<img style="width:100px;" src="'+ objUrl +'" alt="">').append('<span id="delit" onclick="delit3()">删除</span>');

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
                   var delit3 = function(){
                        $('.showpic').children().remove();
                    };
                   
                        
                    </script>
                    
                    <div class="clear"></div>

                
               
                    
                    <div class="clear"></div>

                <div class="art-content">
                    <span class="allred">*</span>
                    <span >内容:</span>
                    <script id="container" class="content" name="content" type="text/plain" style="width:780px;height:300px;"></script>    
                </div>
                <div class="clear"></div>


                <div class="clear"></div>
             <div id="tags" class="qs-tags clearfix">
                <span>标签:</span>
                <div id="tagcontent" class="tags-content">
                    <span style="display: inline;" >您最多可以选择3个标签哟！</span>
                </div>

                <div id="js-tags" class="alltags clearfix" >
					<?php if(is_array($tlist)): foreach($tlist as $key=>$tval): ?><div ><a class="per-tag"  name="<?php echo ($tval[id]); ?>" href="javascript:;"><?php echo ($tval["name"]); ?></a></div><?php endforeach; endif; ?>
                </div>
                <script>
                    //添加标签
                    var addit = function () {  
                        if($('.onactive').length == 2){
                            
                            $(this).siblings().unbind("click",addit);
                        }

                        $(this).clone(true).appendTo('#tagcontent').children().addClass('onactive1').append('<i class="glyphicon glyphicon-remove"></i>').parent().unbind("click", addit);
                       
                        $value = $(this).children().attr("name");
                        
                        $(this).unbind("click", addit); 
                        $('#tagcontent span').css("display","none");
                        $(this).children().addClass('onactive');
                        
                    };
                    
                    //删除标签
                    var delit = function () {
                        
                        if($('.onactive').length == 3 ){      
                            $(this).parent().siblings().bind("click",addit);
                            $('#js-tags').find(".onactive").parent().unbind("click",addit);
                        }
                        if($('.onactive').length == 1 ){   
                            $('#tagcontent span').css("display","inline");
                        }


                        $(this).removeClass('onactive');
                        $(this).parent().bind("click", addit); 
                        $name1=$(this).attr("name");
                        $('#tagcontent').find('a[name ='+ $name1 +' ]').parent().remove();
                        
                        
                    };

                    var delit2 = function () {
                         if($('.onactive').length == 3 ){      
                            $('#js-tags').children().bind("click",addit);
                            $('#js-tags').find(".onactive").parent().unbind("click",addit);
                        }

                        if($('.onactive').length == 1 ){   
                            $('#tagcontent span').css("display","inline");
                        }

                        $(this).parent().remove(); 
                        $name1=$(this).attr("name");
                        $('#js-tags').find('a[name ='+ $name1 +' ]').removeClass('onactive').parent().bind("click", addit); 
                        
                       
                    };
                     
                     //当点击时添加标签  
                     $("#js-tags").children().bind("click", addit); 
                     $("#js-tags").children().delegate(".onactive","click",delit);
                     $("#tagcontent").delegate(".onactive1","click",delit2);
                     
                    
                     
                                        
                   
                </script>
            </div>

             <div class="clear"></div>

            <div class="clear"></div>
            <div class="clear"></div>
                
                <div class="add-time">
                    <span>活动开始时间：</span><input  class="form-control title"  type="text" name="bgtime" placeholder="格式为 XXXX-XX-XX"  />
                    <span>活动结束时间：</span><input  class="form-control title"  type="text" name="edtime" placeholder="格式为 XXXX-XX-XX" />
                </div>
                    


            <div class="clear"></div>

            <div id="qs-sub" class="qs-submit">
                
                <input class="submit" id="sub"  type="submit"  value="发布" />
                    
            </div>
            <script>
                var tags=function(){
                    var tag=new Array();
                    $("#js-tags").children().each(function(){
                         if($(this).children().hasClass("onactive"))
                        tag.push($(this).children().attr("name"));
                    });
                    $(this).before('<input  type="hidden" name="alltag" value="'+tag+'" />');
                    
                  
                
                }; 
               
                
                $("#sub").bind("click",tags);           
            </script>
                
				
				
				


			</form>
			
		</div>
        </div>
	</div>
</body>
</html>