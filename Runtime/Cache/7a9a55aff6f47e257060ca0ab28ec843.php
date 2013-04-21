<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
	$(function(){
		$(".comment_list").submit(function(){
			var form = $(this);
			var addc = $(.addComment);
			var fid = form.find("input").filter('[name=fid]').val();	
			var content = form.find("textarea").val();	
			form.find("p").text(fid);
			/*
			$.post("/ba/index.php/Feed/insertComment",{
				uid:<?php echo (session('uid')); ?>,
				fid:fid,
				content:content,
			},function(data,textStatus){
				/*
				form.find(".comment_box").append(
				"<a href="__APP__/User/showUser/<?php echo ($re["uid"]); ?>" class="username">{data.uid} : </a>
				<p class="comment_content">{data.content}</p>
				<span class="comment_floor">{data.floor}楼</span>");
				
				form.find("p").text(data.fid);
			},"json")
			*/
		})
	})


</script>

<!-- 评论列表 -->
<div class="comment_list">
<?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$re): $mod = ($i % 2 );++$i;?><div class="comment_box">
<a href="__APP__/User/showUser/<?php echo ($re["uid"]); ?>" class="username"><?php echo ($re["uname"]); ?> : </a>
<p class="comment_content"><?php echo ($re["content"]); ?>--fid:<?php echo ($fid); ?></p>
<span class="comment_floor"><?php echo ($re["floor"]); ?>楼</span>
</div>
<p class="addComment"></p><?php endforeach; endif; else: echo "" ;endif; ?>

<!-- /评论列表 -->

<!-- 评论表单 -->
<FORM  class="commentForm" action="javascript:void(0)">
<input type="hidden" name='fid' value=<?php echo ($fid); ?>>
<textarea  name="content"></textarea>
<input class="Btn" type="submit" value="评论">
</FORM>

<!--/评论表单 -->
</div>