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


<div class="content">
<div class="title">发布短篇</div>
<table>
<FORM method="post" action="__URL__/insertSfeed">
<tr>
	<td><input type="text" name="content" maxlength=500
	value="八卦下身边的奇葩、奇事、奇闻……通过审核后将在最新栏目显示哦。"></td>
</tr>
<tr>
	<td><input type="checkbox" name="anonymous" value=1>匿名</td>
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