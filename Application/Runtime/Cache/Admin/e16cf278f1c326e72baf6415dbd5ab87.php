<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="/personalBlog/Public/admin/css/pintuer.css">
<link rel="stylesheet" href="/personalBlog/Public/admin/css/admin.css">
  <link rel="stylesheet" href="/personalBlog/Public/admin/css/laydate.css">
<script src="/personalBlog/Public/admin/js/jquery.js"></script>
<script src="/personalBlog/Public/admin/js/pintuer.js"></script>

</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="" enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="title" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
          <input type="text" id="url1" name="" class="input tips" style="width:25%;float:left;"  value="" style="cursor:pointer;"/>
          <input type="file" name="pic" class="button margin-left;" style="display:none;" id="fileField" size="28" data-validate="required:请选择缩略图"/>
          <input type="button" class="button bg-blue margin-left" id="image1" value="+ 选取图片" onclick="getElementById('fileField').click()" >
          <div class="tipss">图片尺寸：500*500</div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>分类标题：</label>
        </div>
        <div class="field">
          <select name="article" class="input w50">
            <option value="">请选择分类</option>
            <?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["cateid"] == 1): ?><option value="<?php echo ($vo["cateid"]); ?>">小程序</option><?php endif; ?>
              <?php if($vo["cateid"] == 2): ?><option value="<?php echo ($vo["cateid"]); ?>">PHP</option><?php endif; ?>
              <?php if($vo["cateid"] == 3): ?><option value="<?php echo ($vo["cateid"]); ?>">日常分享</option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
          </select>
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="description" style=" height:90px;" data-validate="required:请输入描述"></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>编辑内容：</label>
        </div>
          <textarea name="content" class="common-textarea" id="ueditor" cols="30" style="margin-left:170px;width:600px;height:500px" rows="10"></textarea>
      </div>
     
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="number" class="input w50" name="sortId" value=""  data-validate="number:排序必须为数字" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>作者：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="author" value=""  data-validate="required:请输入发布者名称"/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="/personalBlog/Public/ueditor/ueditor.config.js"></script>
<script src="/personalBlog/Public/ueditor/ueditor.all.js"></script>
<script>
    var ue = UE.getEditor('ueditor');
    var fileBtn = $("#fileField");
    fileBtn.on("change", function(){
        var index = $(this).val().lastIndexOf("\\");
        var sFileName = $(this).val().substr((index+1));
        $("#url1").val(sFileName);
    });


    //只出现确定按钮
    laydate.render({
        elem: '#test'
        ,btns: ['confirm']
    });
</script>
</body>
</html>