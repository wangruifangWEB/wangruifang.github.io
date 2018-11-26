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
<form action="/personalBlog/index.php/Admin/Community/sort" method="post">
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 社区列表</strong></div>
  <div class="padding border-bottom">  
  <a class="button border-yellow" href="/personalBlog/index.php/Admin/Community/add"><span class="icon-plus-square-o"></span> 添加社区</a>
      <input class="button border-blue" type="submit" value="更新排序">
  </div> 
  <table class="table table-hover text-center">
    <tr>
        <th>排序</th>
        <th width="5%">ID</th>
      <th>社区名称</th>
      <th width="250">操作</th>
    </tr>
      <?php if(is_array($communities)): $i = 0; $__LIST__ = $communities;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
              <td>
                  <input type="number" name="<?php echo ($vo["id"]); ?>" value="<?php echo ($vo["sort"]); ?>" style="width:50px; text-align:center; border:1px solid #ddd; padding:7px 0;">
              </td>
              <td><?php echo ($vo["id"]); ?></td>
              <td><?php echo ($vo["title"]); ?></td>
              <td>
                  <div class="button-group">
                      <a type="button" class="button border-main" href="/personalBlog/index.php/Admin/Community/edit/id/<?php echo ($vo["id"]); ?>"><span class="icon-edit"></span>修改</a>
                      <a class="button border-red" href="/personalBlog/index.php/Admin/Community/del/id/<?php echo ($vo["id"]); ?>" onclick="return confirm('你要删除栏目<?php echo ($vo["name"]); ?>吗?');"><span class="icon-trash-o"></span> 删除</a>
                  </div>
              </td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
</div>
</form>
</body>
</html>