<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
	
	.post .featured-media img {
		width: 40px;
		height: 40px;
		border-radius: 50%;
	}
</style>
</head>

<body class="home-template">
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
					<!--内容模块区-->
					<div class="article-container">
						<!--内容模块区-->
						<?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ao): $mod = ($i % 2 );++$i;?><article class="post">
								<div class="post-head">
									<h1 class="post-title"><a href="https://www.golaravel.com/post/2016-ban-laravel-xi-lie-ru-men-jiao-cheng-yi/"><?php echo ($ao["title"]); ?></a></h1>
									<div class="post-meta">
										<span class="author">主人：<a href="http://wangruifang.cn/" target="_blank"><?php echo ($ao["author"]); ?></a></span> •
										<time class="post-date" datetime="" title="<?php echo ($ao["publish_time"]); ?>"><?php echo ($ao["publish_time"]); ?></time>
									</div>
								</div>
								<div class="featured-media">
									<a href="https://www.golaravel.com/post/2016-ban-laravel-xi-lie-ru-men-jiao-cheng-yi/"><img src="/personalBlog/Public/home/assets/img/02.jpg" alt="关注作者" /></a>
									<span><?php echo ($ao["author"]); ?></span>
								</div>
								<div class="post-content">
									<p></p>
									<p><?php echo ($ao["description"]); ?></p>
									<p></p>
								</div>  
								<div class="post-permalink">
									<a href="/personalBlog/index.php/Home/Detail/index/id/<?php echo ($ao["article_id"]); ?>" class="btn btn-default">阅读全文</a>
								</div>
								<footer class="post-footer clearfix"></footer>
							</article><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<nav class="pagination" role="navigation"> 
						<?php echo ($page); ?>
					</nav>
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
</body>

</html>