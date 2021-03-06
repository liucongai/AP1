<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css"></style>
    <link rel="stylesheet" type="text/css" href="/AP1/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/AP1/Public/css/mystyle.css" />
    <script type="text/javascript" src="/AP1/Public/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="/AP1/Public/js/bootstrap.min.js"></script>
</head>

<body>

<div id="lesson_contain" class="page-header">
    <h1>新课程<small>　New Lesson</small></h1>
    <form action="<?php echo U('lessadd');?>" enctype="multipart/form-data" method="post" >
        <input type="hidden" class="form-control" name="user_id" value="1" />
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">课程名</span>
            <input type="text" name="lesson" class="form-control" placeholder="Lesson" aria-describedby="basic-addon1">
        </div>

        <div class="input-group" style="width: 100%;margin-top:10px ">
            <textarea type="text" class="form-control" name="lesson_desc" placeholder="课程介绍"></textarea>
        </div>
        <div class="input-group" style="margin-top: 10px">
            <span class="input-group-addon" id="basic-addon1">课程分类：</span>
            <select class="select1" onchange="change(this)">
                <option value="0">请选择</option>
                <?php if(is_array($fangx)): foreach($fangx as $key=>$val): ?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["name"]); ?></option><?php endforeach; endif; ?>
            </select>

            <select class="select1" name="cate_id" id="fenlei" >
                <option id="cct" value="0">请选择</option>
            </select>
        </div>

        <div class="input-group" style="margin-top: 10px">
            <span class="input-group-addon">第1章</span>
            <input class="form-control" type="text" name="zh_name" placeholder="章节名" /><br>
        </div>
        <div class="input-group" style="width: 100%;margin-top:10px ">
            <textarea class="form-control" type="text" name="zh_desc" placeholder="章节简述" ></textarea>
        </div>
        <div class="input-group" style="margin-top: 10px">
            <span class="input-group-addon">第1节</span>
            <input class="form-control" type="text" name="xi_name" placeholder="小节名" /><br>
        </div>
        <div class="input-group" style="margin-top: 10px">
            <span class="input-group-addon" id="basic-addon1">难度：</span>
            <select class="select1" name="nandu" id="">
                <option value="0">请选择</option>
                <option value="1">初级</option>
                <option value="2">中级</option>
                <option value="3">高级</option>
            </select>
        </div>
        <div class="input-group" style="margin-top: 10px">
             <span class="input-group-addon" id="basic-addon1">课程封面:</span>
            <input class="form-control" type="file" name="fimg" value="课程封面"/>
        </div>
        <div class="input-group" style="margin-top: 10px">
             <span class="input-group-addon" id="basic-addon1">小节视频:</span>
             <input class="form-control" type="file" name="video" value="小节视频" /><br>
        </div>
        <div class="input-group" style="margin-top: 10px;width: 100%">
            <button class="btn btn-success" style="width: 100%" type="submit" value="">添加</button>
        </div>
    </form>

</div>
<br>

</body>
<script>

    function change(ob){
       // alert(1);
        $('#fenlei').children().remove('.opadd');
        $.get('<?php echo U('ajaxName');?>',{id:ob.value},function(result){
             console.dir($(result));
            $.each(result,function(i,val){
                $('#cct').after('<option class="opadd"  value="' + val['id'] + '">'+ val['name'] +'</option>');
            });

        });
    }
    function zchange(ob){
        $('#xiaojie').children().remove('.opadd');
        $.get('<?php echo U('ajaxName');?>',{id:ob.value},function(result){

            $.each(result,function(i,val){

                $('#cctt').after('<option class="opadd"  value="' + val['id'] + '">'+ val['name'] +'</option>');
            });

        });
    }


</script>
</html>