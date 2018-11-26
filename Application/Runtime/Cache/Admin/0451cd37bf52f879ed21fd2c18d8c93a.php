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
<script src="/personalBlog/Public/admin/js/jquery.js"></script>
<script src="/personalBlog/Public/admin/js/pintuer.js"></script>
</head>
<body>
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>姓名</th>
        <th>电话</th>
        <th width="25%">内容</th>
        <th width="220">留言时间</th>
        <th>操作</th>
      </tr>
      
     <?php if(is_array($message)): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td><input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" /><?php echo ($vo["id"]); ?></td>
        <td><?php echo ($vo["uname"]); ?></td>
        <td><?php echo ($vo["utel"]); ?></td>
        <td><?php echo ($vo["content"]); ?></td>
        <td><?php echo ($vo["publish_time"]); ?></td>
        <td><div class="button-group"> <a class="button border-red" href="/personalBlog/index.php/Admin/Message/del/id/<?php echo ($vo["id"]); ?>" onclick="return confirm('你确定要删除此留言吗?'");"><span class="icon-trash-o"></span> 删除</a> </div></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      
      <tr>
        <td colspan="8"><div class="pagelist"> <?php echo ($page); ?> </div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body>
</html>