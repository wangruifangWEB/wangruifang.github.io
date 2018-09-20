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
<form action="/personalBlog/index.php/Admin/Column/sort" method="post">
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 栏目列表</strong></div>
  <div class="padding border-bottom">  
  <a class="button border-yellow" href="/personalBlog/index.php/Admin/Column/add"><span class="icon-plus-square-o"></span> 添加栏目</a>
      <input class="button border-blue" type="submit" value="更新排序">
  </div> 
  <table class="table table-hover text-center">
    <tr>
        <th>排序</th>
        <th width="5%">ID</th>
      <th>栏目名称</th>
      <th width="250">操作</th>
    </tr>
      <?php if(is_array($columns)): $i = 0; $__LIST__ = $columns;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
              <td>
                  <input type="text" name="<?php echo ($vo["column_sort"]); ?>" value="<?php echo ($vo["column_sort"]); ?>" style="width:50px; text-align:center; border:1px solid #ddd; padding:7px 0;">
              </td>
              <td><?php echo ($vo["column_id"]); ?></td>
              <td><?php echo ($vo["column_title"]); ?></td>
              <td>
                  <div class="button-group">
                      <a type="button" class="button border-main" href="/personalBlog/index.php/Admin/Column/edit/id/<?php echo ($vo["column_id"]); ?>"><span class="icon-edit"></span>修改</a>
                      <a class="button border-red" href="/personalBlog/index.php/Admin/Column/del/id/<?php echo ($vo["column_id"]); ?>" onclick="return confirm('你要删除栏目<?php echo ($vo["cate_name"]); ?>吗?');"><span class="icon-trash-o"></span> 删除</a>
                  </div>
              </td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
</div>
</form>
</body>
</html>