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
			<li><a href="__APP__/Feed/showfriends">好友</a></li>
			<li><a href="__APP__/Feed/showsop">收藏</a></li>
			<li><a href="__APP__/Feed/showlop">订阅</a></li>
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
			<li><a href="__APP__/User/showUser/<?php echo (session('uid')); ?>"><?php echo (session('uname')); ?></a></li>
			</span>
		</ul>	
	</div>
</div>
<!--/顶部导航-->
<!--/banner 及 导航栏 -->

<!--内容栏-->
<div id="contentbox">

<!--右侧栏-->
<script type="text/javascript">
$(function(){
	$(".addfriend").click(function(){
		var add = $(this).find('a');
		$.post("/ba/index.php/User/addfriend",{
			uid:add.attr('uid')
		},function(data,textStatus){		
			add.replaceWith(data);
		},"json")		
	});
	
	$(".delfriend").click(function(){
		var del = $(this).find('a');
		var delp = $(this).find('p');
		$.post("/ba/index.php/User/delfriend",{
			uid:del.attr('uid')
		},function(data,textStatus){		
			del.replaceWith(data);
			delp.replaceWith("<p></p>")
		},"json")		
	});
})

</script>



<!--右侧栏-->
<div id="rightbox">
	<div class="namecard">
	<a ><img src="../Public/images/logo.jpg"></a>
	
	<a href="javascript:void(0)"><?php echo ($cdata["uname"]); ?></a>
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
	<tr>
	<?php switch($cdata["isfriend"]): case "1": ?><td class="delfriend"><p>已关注</p><a href="javascript:void(0)" uid=<?php echo ($cdata["uid"]); ?>>取消关注</a></td><?php break;?>
	<?php case "2": ?><td class="addfriend" ><a href="javascript:void(0)" uid=<?php echo ($cdata["uid"]); ?>>关注此人+</a></td><?php break;?>
	<?php default: endswitch;?>
	</tr>
	</table>
	
	</div>
	
</div>
<!--/右侧栏-->
<!--/右侧栏-->

<!--/左侧栏-->



<script type="text/javascript">
$(function(){
	$(".islike").click(function(){
		var islike = $(this);
		var sfeedid = parseInt($(this).find("input").filter('[name=sfeedid]').val());
		var islikenum = parseInt($(this).find("input").filter('[name=islike]').val());
		islike.css("border","solid rgb(243,92,120) thin");
		$.post("/ba/index.php/Feed/islike",{
			uid:<?php echo (session('uid')); ?>,
			sfeedid:sfeedid,
			islike:islikenum,
		}, function(data,textStatus){
			var islikenum = data;
			islike.find("span").text(islikenum);		
			},"json");
	});
	
	$(".unlike").click(function(){
		var unlike = $(this);
		var sfeedid = parseInt($(this).find("input").filter('[name=sfeedid]').val());
		var unlikenum = parseInt($(this).find("input").filter('[name=unlike]').val());
		unlike.css("border","solid rgb(243,92,120) thin");
		$.post("/ba/index.php/Feed/unlike",{
			uid:<?php echo (session('uid')); ?>,
			sfeedid:sfeedid,
			unlike:unlikenum,
		}, function(data,textStatus){
			var unlikenum = data;
			unlike.find("span").text(unlikenum);		
			},"json");
	});
	
	$(".share").click(function(){
		var store = $(this);
		store.find("a").css("color","rgb(243,92,120)");
		var sfeedid = parseInt($(this).find("input").filter('[name=sfeedid]').val());
		var storenum = parseInt($(this).find("input").filter('[name=store]').val());
		$.post("/ba/index.php/Feed/store",{
			uid:<?php echo (session('uid')); ?>,
			sfeedid:sfeedid,
			storenum:storenum,
		},function(data,textStatus){
			store.find("span").text(data);	
		},"json");
	});
	
	$(".sub").click(function(){
		var lstore = $(this);
		lstore.find("a").css("color","rgb(243,92,120)");
		var lfeedid = parseInt($(this).find("input").filter('[name=lfeedid]').val());
		var lstorenum = parseInt($(this).find("input").filter('[name=lstore]').val());
		$.post("/ba/index.php/Feed/sub",{
			uid:<?php echo (session('uid')); ?>,
			lfeedid:lfeedid,
			lstorenum:lstorenum,
		},function(data,textStatus){
			lstore.find("span").text(data);	
		},"json");
	});
	
	$(".comment").click(function(){
		var comment = $(this);
		var sfeedid = $(this).find('a').attr('val');
		var commentlist = $("#comment"+sfeedid);
		$.post("/ba/index.php/Feed/comment",{
			sfeedid:sfeedid
		},function(data,textStatus){
			commentlist.html(data);	
		});	
		commentlist.toggle(400);	
	});
})
	
	
</script>

<!--/左侧栏-->
<div id="leftbox">
<!--NewsFeed-->
<div class="feedbox">
	<!--评论列表-->
	<ul class="feed_list">

<!--feed-->
<?php if(is_array($slist)): $i = 0; $__LIST__ = $slist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sfeed): $mod = ($i % 2 );++$i;?><li class="feed_line">
		<!--头像与用户名-->
		<?php if(($sfeed["anonymous"]) == "0"): ?><div class="userPic">
		<a><img src="../Public/images/logo.jpg"></a>
		<span><a href="__APP__/User/showUser/<?php echo ($sfeed["uid"]); ?>"><?php echo ($sfeed["uname"]); ?></a>:</span>	
		</div><?php endif; ?>
		<!--/头像与用户名-->
		<!--内容-->
		<div class="msgCnt">
		<?php if(($sfeed["status"]) == "2"): ?><a href = "__APP__/Feed/showlstore/<?php echo ($sfeed["lfeedid"]); ?>/<?php echo ($sfeed["uid"]); ?>" class="title"><?php echo ($sfeed["title"]); ?></a>
		<span class="cnt"><?php echo ($sfeed["floor"]); ?>F  </span><?php endif; ?><span >lid:<?php echo ($sfeed["lfeedid"]); ?>--lstorenum:<?php echo ($sfeed["lstorenum"]); ?>--sid:<?php echo ($sfeed["sfeedid"]); ?>--uid:<?php echo ($sfeed["uid"]); ?>---status:<?php echo ($sfeed["status"]); ?>--content:<?php echo ($sfeed["content"]); ?>--title:<?php echo ($sfeed["title"]); ?></span>		
		</div>
		<!--/内容-->
		<!--操作-->
		<div class="operate">
			<!--顶与踩-->
		    <a href="javascript:void(0)"  class="islike">
			<input type="hidden" name="sfeedid"  value=<?php echo ($sfeed["sfeedid"]); ?>>
			<input type="hidden" name="islike"  value=<?php echo ($sfeed["islike"]); ?>>
			<img src="../Public/images/up.png"><span><?php echo ($sfeed["islike"]); ?></span></a>
			
			<a href="javascript:void(0)"  class="unlike">
			<input type="hidden" name="sfeedid"  value=<?php echo ($sfeed["sfeedid"]); ?>>
			<input type="hidden" name="unlike"  value=<?php echo ($sfeed["unlike"]); ?>>
			<img src="../Public/images/down.png"><span><?php echo ($sfeed["unlike"]); ?></span></a>
			
			<!--/顶与踩-->
			<span class="comment">
			<a href="javascript:void(0)" val="<?php echo ($sfeed["sfeedid"]); ?>">评论(<span><?php echo ($sfeed["comment"]); ?></span>)</a>
			</span>
			
			<span class="share">
			<input type="hidden" name="sfeedid"  value=<?php echo ($sfeed["sfeedid"]); ?>>
			<input type="hidden" name="store"  value=<?php echo ($sfeed["store"]); ?>>
			<a href="javascript:void(0)">收藏(<span><?php echo ($sfeed["store"]); ?></span>)</a>
			</span>	
			
			<?php if(($sfeed["status"]) == "2"): ?><span class="sub">
			<input type="hidden" name="lfeedid"  value=<?php echo ($sfeed["lfeedid"]); ?>>
			<input type="hidden" name="lstore"  value=<?php echo ($sfeed["lstorenum"]); ?>>
			<a href="javascript:void(0)">订阅直播(<span><?php echo ($sfeed["lstorenum"]); ?></span>)</a>
			</span><?php endif; ?>
					
		</div>
		<!--/操作-->
		<!--评论-->
		<div id=comment<?php echo ($sfeed["sfeedid"]); ?> class = commentlist style="display:none">
		
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