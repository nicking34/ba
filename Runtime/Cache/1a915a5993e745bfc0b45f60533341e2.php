<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八吧</title>
<link rel="stylesheet" type="text/css" href="themes/public.css">
<script src="js/jquery-1.7.js" type="text/javascript"></script>
<script src="js/nav.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/themes/public.css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/nav.js"></script>
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


<div class="content">
<div class="title">新建直播</div>
<table>
<FORM method="post" action="__URL__/insertLfeed">
<tr>
	<td><input type="text" name="title" maxlength=100
	value="请输入直播的标题"></td>
</tr>
<input type="hidden" name='uid' value='<?php echo (session('uid')); ?>'>
<tr>
	<td><input type="submit" value="发布"></td>
</tr>
</FORM>
</table>
</div>

</body>
</html>