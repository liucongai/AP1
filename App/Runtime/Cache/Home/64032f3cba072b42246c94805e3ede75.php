<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css">
        .add_xiao{display: none}
        .add_zhang{display: none}
    </style>

    <script type="text/javascript" src="/AP1/Public/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="/AP1/Public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/AP1/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/AP1/Public/css/mystyle.css" />


</head>
<body>


<!--################################################## -->
<div class="row">
    <div class="col-md-2">Empty Resources</div>
    <div class="col-md-8">


        <p>页面测试</p>
        <p><?php echo ($no_lesson); ?></p>
        <ul id="lesson">
            <a class="btn btn-primary" href='<?php echo U('Lesson/index');?>'>添加课程</a>
            <?php if(is_array($lesson)): foreach($lesson as $key=>$val): ?><li class="btn btn-default" onclick="lesson(this)"><?php echo ($val["lesson"]); ?></li>
                <i hidden><?php echo ($val["id"]); ?></i><?php endforeach; endif; ?>
        </ul>

        <div id="tab_select" style="height: 100px;width: 100%">
            <button class="btn btn-default" style="float: left">Test</button>

            <select class="select1" id="add_zhang" name="" onchange="change(this)">
                <option id="zhang" value="0">请选择</option>
            </select>
            <select class="select1" id="add_xiao" name="" >
                <option id="cct" value="0">请选择</option>
            </select>
        </div>
        <div class="add_zhang" style="width: 350px;">
            <form action="<?php echo U('zhangadd');?>" enctype="multipart/form-data" method="post">
                <input type="hidden" name="lesson_id" value="" class="get_lesson">
                <input type="text" class="form-control" name="zh_name" placeholder="新章节名" /><br>
                <textarea class="form-control" type="text" name="zh_desc" placeholder="章节简述" ></textarea><br>
                <input type="text" class="form-control" name="xi_name" placeholder="小节名" /><br>
                <span class="input-group-addon" id="basic-addon1">小节视频:</span>
                <input class="form-control" type="file" name="video" value="小节视频" /><br>
                <button class="btn btn-success" style="width: 100%" type="submit" value="">添加</button>
            </form>
        </div>
        <div class="add_xiao" style="width: 350px">
            <form action="<?php echo U('xiaoadd');?>" enctype="multipart/form-data" method="post">
                <input type="hidden" name="zh_id" value="" class="get_zhang">
                <input class="form-control" type="text" name="xi_name" placeholder="小节名" /><br>
                <span class="input-group-addon" id="basic-addon1">小节视频:</span>
                <input class="form-control" type="file" name="video" value="小节视频" /><br>
                <button class="btn btn-success" style="width: 100%" type="submit" value="">添加</button>
            </form>
        </div>
    </div>
</div>
</body>
<script>

   function lesson(ob){
        $('.get_lesson').attr('value',$(ob).next().text());
        $('#zhang ~ option').remove('.opadd');
        $('#cct ~ option').remove('.opadd');
        $.get('<?php echo U('ajaxName');?>',{id:$(ob).next().text()},function(result){
           // console.dir($(result));
            $.each(result,function(i,val){
                $('#zhang').after('<option class="opadd select1"  value="' + val['id'] + '">'+ val['zh_name'] +'</option>');
            });
        });

    }
   function change(ob){

       $('#cct ~ option').remove('.opadd');
       $.get('<?php echo U('xi_ajaxName');?>',{id:ob.value},function(result){
           console.dir($(result));
           $.each(result,function(i,val){
               $('#cct').after('<option class="opadd select1"  value="' + val['id'] + '">'+ val['xi_name'] +'</option>');
           });

       });
   }


   $('#add_zhang').mousedown(function(e){
       if(e.which == 3) {

           $(".add_zhang").fadeIn("slow","linear");
           $(".add_xiao").hide();

           $(this).bind("contextmenu",function(e){
               return false;
           });
       }
   });


   $('#add_xiao').mousedown(function(e){
       if(e.which == 3) {
           $('.get_zhang').attr('value',$('#add_zhang').val());
           $(".add_xiao").fadeIn("slow","linear");
           $(".add_zhang").hide();

           $(this).bind("contextmenu",function(e){
               return false;
           });
       }
   });




</script>
</html>