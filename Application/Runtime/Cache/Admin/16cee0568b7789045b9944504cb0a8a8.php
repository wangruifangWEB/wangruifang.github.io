<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>
    <link rel="stylesheet" href="/personalBlog/Public/admin/css/pintuer.css">
    <link rel="stylesheet" href="/personalBlog/Public/admin/css/admin.css">
    <script src="/personalBlog/Public/admin/js/jquery.js"></script>
    <script src="/personalBlog/Public/admin/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel margin-top">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="">
            <input type="hidden" name="column_id[]" value="<?php echo ($communities["id"]); ?>">
            <div class="form-group">
                <div class="label">
                    <label>栏目名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="title" value="<?php echo ($communities["title"]); ?>" data-validate="required:请输入标题" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
		        <div class="label">
		          <label>社区URL：</label>
		        </div>
		        <div class="field">
		          <input type="text" class="input w50" name="url" value="<?php echo ($communities["url"]); ?>" data-validate="required:请输入URL" />
		          <div class="tips"></div>
		        </div>
		      </div>
            <div class="form-group">
                <div class="label">
                    <label>排序：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="column_sort" value="<?php echo ($communities["sort"]); ?>"  data-validate="required:,number:排序必须为数字" />
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
</script>
</body>
</html>