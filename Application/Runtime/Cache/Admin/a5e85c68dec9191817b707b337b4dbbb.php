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
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onClick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加分类</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="15%">栏目分类</th>
      <th width="15%">一级分类</th>
      <th width="10%">排序</th>
      <th width="10%">操作</th>
    </tr>
    <!--循环分类列表-->
    <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($vo["cate_id"]); ?></td>
        <td> <?php echo ($vo["column_title"]); ?> </td>
        <td><?php echo ($vo["cate_name"]); ?></td>
        <td><?php echo ($vo["cate_sort"]); ?></td>
        <td><div class="button-group"> <a class="button border-main" href="/personalBlog/index.php/Admin/Cate/Cate/edit/id/<?php echo ($vo["cate_id"]); ?>"> <span class="icon-edit"></span> 修改</a> <a class="button border-red" href="/personalBlog/index.php/Admin/Cate/del/id/<?php echo ($vo["cate_id"]); ?>" onClick="return confirm('你确定要删除<?php echo ($vo["cate_name"]); ?>吗?');"> <span class="icon-trash-o"></span> 删除</a> </div></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
</div>
<script type="text/javascript">
function del(id,mid){
	if(confirm("您确定要删除吗?")){			
		
	}
}
</script>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/personalBlog/index.php/Admin/Cate/add">
      <div class="form-group">
        <div class="label">
          <label>上级栏目：</label>
        </div>
        <div class="field">
          <select name="column_id" class="input w50">
            <option value="">请选择栏目分类</option>
            <?php if(is_array($columns)): $i = 0; $__LIST__ = $columns;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?><option value="<?php echo ($co["column_id"]); ?>"><?php echo ($co["column_title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
          <!-- <div class="tips">不选择栏目默认为一级分类</div>--> 
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>分类标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="cate_name" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>关键字标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="cate_keywords_title" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>分类关键字：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="cate_keywords" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>关键字描述：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="cate_desc"/>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="number" class="input w50" name="cate_sort" value="0"  data-validate="number:排序必须为数字" />
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
</body>
</html>