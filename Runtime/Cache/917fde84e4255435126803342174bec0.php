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
	


<div class="content">
<div class="title">注册新用户</div>
<table>
<FORM method="post" action="__URL__/insert">
<tr>
	<td>用户名</td>
	<td><input type="text" name="uname"></td>
</tr>
<tr>
	<td>密码</td>
	<td><input type="text" name="password"></td>
</tr>
<tr>
	<td><input type="submit" value="注册"></td>
</tr>

</FORM>
</table>
</div>

</body>
</html>