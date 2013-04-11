<?php if (!defined('THINK_PATH')) exit();?><!--右侧栏-->
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