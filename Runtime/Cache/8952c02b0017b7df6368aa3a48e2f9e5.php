<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八吧</title>
<link rel="stylesheet" type="text/css" href="../Public/themes/public.css">
<script src="../Public/js/jquery-1.7.js" type="text/javascript"></script>
<script src="../Public/js/nav.js" type="text/javascript"></script>
<script language="JavaScript">
<!--
var URL = '__URL__';
var APP	 =	 '__APP__';
var PUBLIC = '__PUBLIC__';
</script>
</head>

<body>
	<?php echo (session('uname')); ?>
	<?php echo (session('uid')); ?>
	

<div id="wrap">

<!--banner 及 导航栏 -->
<!--banner-->
<div class="banner">
	<div class="banner_title"><h1>八吧</h1>
	<span >分享身边的八卦趣事</span>
	</div>
</div>
<!--/banner-->

<!--顶部导航-->
<div id="header">
	<div id="nav">
		<!--Logo
		<div class="logo">
		<img src="images/logo.jpg" alt="八吧"/>
		</div>
		Logo-->
		<ul>
			<li><a href="#">首页</a></li>
			<li><a href="#">热门</a></li>
			<li><a href="#">好友</a></li>
			<li><a href="#">审帖</a></li>
			<li><a href="#">收藏</a></li>
			<span>
			<li class="wider"><a href="#">写直播</a>
				<ul>
				<li><a href="#">我的前任是极品</a></li>
				<li><a href="#">八一八我的极品室友</a></li>
				<li><a href="#">>>更多我的直播</a></li>
				<li><a href="#">+新建直播</a></li>
				</ul>
			</li>
			<li><a href="#">写短篇</a></li>
			<li><a href="#">消息</a>
				<ul>
				<li><a href="#">查看评论</a></li>
				<li><a href="#">查看粉丝</a></li>
				<li><a href="#">查看私信</a></li>
				<li><a href="#">查看通知</a></li>
				<li><a href="#">提醒设置</a></li>
				</ul>
			</li>
			<li><a href="#"><?php echo (session('uname')); ?></a></li>
			</span>
		</ul>	
	</div>
</div>
<!--/顶部导航-->
<!--/banner 及 导航栏 -->

<!--内容栏-->
<div id="contentbox">

<!--右侧栏-->
<!--右侧栏-->
<div id="rightbox">
	<div class="namecard">
	<a href="#"><img src="../Public/images/logo.jpg"></a>
	<span><?php echo (session('uname')); ?></span>
	</div>
	<div class="infbox">
	<table border="0">
	<tr>
	<td><a href="#"><span >短篇</span><?php echo ($cdata["sfeed"]); ?></a></td>
	<td><a href="#"><span >直播 </span><?php echo ($cdata["lfeed"]); ?></a></td>
	</tr>
	<tr>
	<td><a href="#"><span >粉丝</span><?php echo ($cdata["fans"]); ?></a></td>
	<td> <a href="#"><span >关注 </span><?php echo ($cdata["attention"]); ?></a></td>
	</tr>
	</table>
	</div>
</div>
<!--/右侧栏-->
<!--/右侧栏-->

<!--/左侧栏-->
<!--/左侧栏-->
<div id="leftbox">
<!--NewsFeed-->
<div class="feedbox">
	<!--评论列表-->
	<ul class="feed_list">
	<!--二级导航-->
	<div id="secnav">
		<ul>
		<li><a href="#">全部</a></li>
		<li><a href="#">短篇</a></li>
		<li><a href="#">直播</a></li>
		</ul>
	</div>
<!--/二级导航-->

<!--feed-->
<?php if(is_array($slist)): $i = 0; $__LIST__ = $slist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sfeed): $mod = ($i % 2 );++$i;?><li class="feed_line">
		<!--头像与用户名-->
		<?php if(($sfeed["anonymous"]) == "0"): ?><div class="userPic">
		<a href="#"><img src="../Public/images/logo.jpg"></a>
		<span><a href="#"><?php echo ($sfeed["uname"]); ?></a>:</span>	
		</div><?php endif; ?>
		<!--/头像与用户名-->
		<!--内容-->
		<div class="msgCnt">
		<?php if(($sfeed["status"]) == "2"): ?><p class="title"><?php echo ($sfeed["title"]); ?></p>
		<span class="cnt"><?php echo ($sfeed["floor"]); ?>F  </span><?php endif; ?><span >---<?php echo ($sfeed["status"]); ?>--<?php echo ($sfeed["content"]); ?>--<?php echo ($sfeed["title"]); ?>--<?php echo ($sfeed["title"]); ?></span>		
		</div>
		<!--/内容-->
		<!--操作-->
		<div class="operate">
			<!--顶与踩-->
			<span class="islike">
			<img src="../Public/images/up.png"><?php echo ($sfeed["islike"]); ?></span>
			<span class="islike">
			<img src="../Public/images/down.png"><?php echo ($sfeed["unlike"]); ?></span>
			<!--/顶与踩-->
			<span class="share">
			<a href="#">评论(<?php echo ($sfeed["comment"]); ?>)</a>
			</span>
			<span class="share">
			<a href="#">收藏(<?php echo ($sfeed["store"]); ?>)</a>
			</span>			
		</div>
		<!--/操作-->
		<!--评论-->
		<div class="comment">
		
		</div>
		<!--/评论-->
	</li><?php endforeach; endif; else: echo "" ;endif; ?>
<!--/feed-->

	</ul>
	<!--/评论列表-->
</div>
<!--/NewsFeed-->

</div>
<!--/左侧栏-->
<!--/左侧栏-->

</div>
<!--内容栏-->


</div>
</body>
</html>