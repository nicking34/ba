<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八吧</title>
<link rel="stylesheet" type="text/css" href="../Public/themes/public.css">
<link rel="stylesheet" type="text/css" href="../Public/themes/feed.css">
<script src="../Public/js/jquery-1.7.js" type="text/javascript"></script>
<script src="../Public/js/jquery.simplemodal-1.4.4.js" type="text/javascript"></script>
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

<div class="test"><?php echo ($test1); ?>test</div>

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
			<li><a href="__APP__/Public/home#">首页</a></li>
			<li><a href="#">热门</a></li>
			<li><a href="#">好友</a></li>
			<li><a href="#">审帖</a></li>
			<li><a href="#">收藏订阅</a></li>
			<span>
			<li class="wider"><a href="__APP__/Feed/addLstore">写直播</a>
				<ul>
				<li><a href="#">我的前任是极品</a></li>
				<li><a href="#">八一八我的极品室友</a></li>
				<li><a href="#">>>更多我的直播</a></li>
				<li><a href="__APP__/Feed/addLfeed">+新建直播</a></li>
				</ul>
			</li>
			<li><a href="__APP__/Feed/addSfeed">写短篇</a></li>
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


<!--/左侧栏-->
<div class="content">
<div class="title">新建直播</div><br/>
<table>
<FORM method="post" action="__URL__/insertLfeed">
<tr>
	<td><textarea type="text" name="title" maxlength=100 >请输入直播的标题</textarea></td>
</tr>
<input type="hidden" name='uid' value='<?php echo (session('uid')); ?>'>
<tr>
	<td><input type="submit" value="发布" class="Btn"></td>
</tr>
</FORM>
</table>
</div>

</body>
</html>
<!--/左侧栏-->

</div>
<!--内容栏-->


</div>
</body>
</html>