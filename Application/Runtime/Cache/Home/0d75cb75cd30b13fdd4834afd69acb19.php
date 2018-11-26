<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0026)https://www.golaravel.com/ -->
<html lang="zh-CN">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta http-equiv="refresh" content="20"> <!--页面自动刷新,其中20指每隔20秒刷新一次页面.-->
		<title>个人小屋</title>
		<meta name="description" content="本博客分享总结自己项目中遇到的坑" />
		<meta name="keywords" content="博客 分享 web 前端" />
		<meta name="HandheldFriendly" content="True" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<link rel="stylesheet" href="/personalBlog/Public/home/assets/css/bootstrap_3.3.4_css_bootstrap.min.css" />
		<link rel="stylesheet" href="/personalBlog/Public/home/assets/css/highlight.js_9.0.0_styles_vs.min.css" />
		<link rel="stylesheet" type="text/css" href="/personalBlog/Public/home/assets/css/screen.min.css" />
		<script type="text/javascript" src="/personalBlog/Public/home/assets/js/jquery.min.js"></script>
		<style id="fit-vids-style">
			.fluid-width-video-wrapper {
				width: 100%;
				position: relative;
				padding: 0;
			}
			
			.fluid-width-video-wrapper iframe,
			.fluid-width-video-wrapper object,
			.fluid-width-video-wrapper embed {
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
			}
			
			.article-container {
				background-color: #fff;
				padding: 20px 30px;
				margin-bottom: 60px;
			}
			
			.article-head {
				text-align: center;
				margin: 20px 0 40px 0;
			}
			
			.article-head .article-title {
				margin: 0;
				font-size: 2em;
				line-height: 1.2em;
			}
			
			.article-head .article-title a {
				color: #303030;
			}
			
			.article-head .article-meta {
				color: #959595;
				margin: 14px 0 0;
			}
		</style>
	</head>

	<body class="home-template">

		<div id="">
			<!--头部内容引入-->
			<header class="main-header" style="background-image: url(/personalBlog/Public/home/assets/img/bg.jpg)">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1><span class="hide">Laravel - </span>空即是拥有</h1>
        <h2 class="hide">我就是一个爱着自己职业的疯姑娘</h2>
      <div class="col-xs-12 hidden-xs hidden-sm"> <a href="https://cn.vuejs.org/" class="btn btn-default btn-doc" target="_blank">VueJs 文档</a> <a href="https://nodejs.org/en/" class="btn btn-default btn-doc" target="_blank">Node 文档</a> <a href="https://angularjs.org/" class="btn btn-default btn-doc" target="_blank">Angular 文档</a> </div>
    </div>
  </div>
</header>
<nav class="main-navigation">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="navbar-header"> <span class="nav-toggle-button collapsed" data-toggle="collapse" data-target="#main-menu"><span class="sr-only">Toggle navigation</span> <i class="fa fa-bars"></i></span> </div>
        <div class="collapse navbar-collapse" id="main-menu">
          <ul class="menu">
          	<?php if(is_array($columns)): $i = 0; $__LIST__ = $columns;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li role="presentation" style="font-weight: bold"> <a href="/personalBlog/index.php/" title="首页"><?php echo ($vo["column_title"]); ?></a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>


			<section class="content-wrap">
				<div class="container">
					<div class="row">
						<main class="col-md-8 main-content">
							<!--  <?php echo htmlspecialchars_decode($list.content) ?>-->
							<div class="article-container">
								<div class="article-head">
									
									<h1 class="article-title"><a href="javasvript:;"><?php echo ($list["title"]); ?></a></h1>
									<div class="article-meta">
										<span class="author">主人：<a href="http://wangruifang.cn/" target="_blank"><?php echo ($list["author"]); ?></a></span> •
										<time class="article-date" datetime="" title="<?php echo ($list["publish_time"]); ?>"><?php echo ($list["publish_time"]); ?></time>
									</div>
								</div>
								<?php $rows=mysql_fetch_array($list); echo html_entity_decode($list['content']); ?>
								<!--评论-->
								<div class="comment">
									<p>评论区</p>
									<ul class="list">
										<?php if(is_array($total)): $i = 0; $__LIST__ = $total;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
												<p><span><?php echo ($vo["uname"]); ?></span> • <?php echo ($vo["publish_time"]); ?></p>
												<p><?php echo ($vo["content"]); ?></p>
												<a href="javascript:;" class="replyShow">回复</a>
												<input type="hidden" value="<?php echo ($vo["id"]); ?>" class="commentId"/>
												<ul>
													<?php if(is_array($vo['new'])): $i = 0; $__LIST__ = $vo['new'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
															<p><span><?php echo ($v["replyname"]); ?></span> • <?php echo ($v["reply_time"]); ?></p>
															<p><?php echo ($v["replycontent"]); ?></p>
														</li><?php endforeach; endif; else: echo "" ;endif; ?>
													<!--<form action="/personalBlog/index.php/Home/Detail/reply" enctype="application/x-www-form-urlencoded" method="get">-->
														<div class="replyBox">
															<input type="text" placeholder="请输入姓名" id="replyName" name="replyname"/>
															<textarea name="" rows="1" cols="64" placeholder="理性言论哦" id="replyContent"></textarea>
															<button id="reply">添加回复</button>
														</div>
													<!--</form>-->
												</ul>
											</li><?php endforeach; endif; else: echo "" ;endif; ?>
									</ul>
									<form action="POST" id="formId">
										<ul>
											<li>
												<input type="text" placeholder="请输入姓名" id="uname" />
											</li>
											<li>
												<textarea name="" rows="5" cols="60" placeholder="理性言论喽" id="desc"></textarea>
											</li>
											<li>
												<button type="button" class="commentBtn" onclick="throttle(leaveMsg)">提交留言</button>
											</li>
										</ul>
									</form>
								</div>
							</div>
						</main>
						<!--右侧内容引入-->
						<aside class="col-md-4 sidebar">
	<div class="widget">
		<h4 class="title">技术频道</h4>
		
			<div class="content">
				<?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?><form action="/personalBlog/index.php/Home/Index/index" method="post">
					<p>
	                    <input type="hidden" name="id" value="<?php echo ($ca["cate_id"]); ?>" />
						<input type="submit" value="<?php echo ($ca["cate_name"]); ?>" style="border:none;background-color:#fff;color:#000;"/>
					</p>
                    </form><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		
	</div>
	<div class="widget">
		<h4 class="title">社区</h4>
		<div class="content community">
			<?php if(is_array($communities)): $i = 0; $__LIST__ = $communities;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?><p>
					<a href="<?php echo ($co["url"]); ?>" title="<?php echo ($co["title"]); ?>" target="_blank" onClick=""><i class="fa fa-comments"></i> <?php echo ($co["title"]); ?></a>
				</p><?php endforeach; endif; else: echo "" ;endif; ?>

		</div>
	</div>
	<div class="widget">
		<h4 class="title">最近文章</h4>
		<?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/personalBlog/index.php/Home/Detail/index/id/<?php echo ($vo["article_id"]); ?>" class="btn btn-default btn-block" target="_blank"><?php echo ($vo["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
</aside>
					</div>
				</div>
			</section>

			<!--底部内容引入-->
			<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-sm-12"> <span>Copyright &copy; <a href="http://www.golaravel.com/">个人小屋</a></span> | <span><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备18028922号-1</a></span> | </div>
    </div>
  </div>
</div>
		</div>

		<script type="text/javascript">
			//$(function() {
			//首次留言
			var leaveMsg = function() {
				var uname = $('#uname').val();
				var desc = $('#desc').val();
				if(uname == '' || desc == '') {
					alert('输入不能为空！');
					return false;
				} else {
					$.ajax({
						url: "<?php echo U('Detail/comment');?>",
						type: "GET",
						async: false,
						dataType: 'json',
						data: {
							'uname': uname,
							'desc': desc,
							'id': getParam()
						},
						contentType: 'application/json; charset=utf-8',
						success: function(res) {
							if(res) {
								//获取当前时间
								//var mydate = new Date();
								//var t=mydate.toLocaleString();
								var result = `<li>
								               <span>${uname}</span> • 刚刚
								               <p>${desc}</p>
								               <a href="javascript:;" class="replyShow">回复</a>
								               <ul>
													<div class="replyBox" style="display:none;">
														<input type="text" placeholder="请输入姓名" id="replyName" />
														<textarea name="" rows="1" cols="64" placeholder="理性言论哦" id="replyContent"></textarea>
														<button id="reply">添加回复</button>
													</div>
												</ul>
								               </li>`;
								$('.list').append(result);
								alert('留言成功！');
							}
						},
						error: function(res) {
							alert('留言失败！');
							console.log(res.responseText);
						}
					});
				}
			}

			//回复留言
			//调出回复输入框
			$('.list').on('click','.replyShow',function() {
			    console.log('点击了');
				$('.replyBox').hide(500);
				$(this).siblings('ul').children('.replyBox').show(500);
				$(this).siblings('ul').children('.replyBox').children('input').focus();
			});
			
			$('.list').on('click','#reply',function(){
				$(".replyBox").hide(500);
				//给当前的提交按钮添加自定义属性值，作为区分
				$(this).addClass('currentIdx');
				throttle(replyLeave);
			})

			var replyLeave = function() {
				var replyName = $('.currentIdx').siblings('#replyName').val();
				var replyContent = $('.currentIdx').siblings('#replyContent').val();
				var commentId = $('.curenrtIdx').parent().parent().siblings('.commentId').val();
				console.log(commentId);
				
				if(replyName == '' || replyContent == '') {
					alert('输入不能为空！');
					//清除添加的class
					$('#reply').removeClass('currentIdx');
					return false;
				} else {
					$.ajax({
						url: "<?php echo U('Detail/reply');?>",
						type: "GET",
						async: false,
						dataType: 'json',
						data: {
							'replyName': replyName,
							'replyContent': replyContent,
							'commentId': commentId
						},
						contentType: 'application/json; charset=utf-8',
						success: function(res) {
							console.log(res);
							if(res) {
								var result = `<li><span>${replyName}</span> • 刚刚<p>${replyContent}</p></li>`;
								$('.currentIdx').parent().parent().append(result);
								alert('留言成功！');
							}
						},
						error: function(res) {
							alert('留言失败！');
							console.log(res.responseText);
						}
					});
				}
			}

			function getParam() {
				var url = document.location.href; //首先获取到你的URL地址;
				var ary = url.split("id/"); //用“&”将URL分割成2部分每部分都有你需要的东西;
				var id = ary[1]; //获取到URL的另一部分"id值";
				return id;
			}

			//节流
			function throttle(method, context) {
				clearTimeout(method.tId);
				method.tId = setTimeout(function() {
					method.call(context);
				}, 100);
			}
			//})
		</script>
	</body>

</html>