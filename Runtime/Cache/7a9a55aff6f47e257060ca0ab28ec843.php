<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
	$(function(){
		$(".commentForm").click(function(){
			var form = $(this);
			var fid = form.find("input").filter('[name=fid]').val();						
			var content = form.find("textarea").val();		
			$.post("/ba/index.php/Feed/insertComment",{
				uid:<?php echo (session('uid')); ?>,
				fid:fid,
				content:content,
			},function(data,textStatus){
				form.find("p").text(data.fid);
			},"json")
		})
	})


</script>

<!-- 评论列表 -->
<div class="comment_list">
<?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$re): $mod = ($i % 2 );++$i;?><div class="comment_box">
<a href="javascript:void(0)" class="username"><?php echo ($re["uname"]); ?> : </a><p class="comment_content"><?php echo ($re["content"]); ?></p><span class="comment_floor"><?php echo ($re["floor"]); ?>楼</span>
</div><?php endforeach; endif; else: echo "" ;endif; ?>

<!-- /评论列表 -->

<!-- 评论表单 -->
<FORM  class="commentForm" action="javascript:void(0)">
<input type="hidden" name='fid' value=<?php echo ($data); ?>>
<input type="hidden" name='uid' value='<?php echo (session('uid')); ?>'>
<textarea  name="content"></textarea>
<input class="Btn" type="submit" value="评论">
<p></p>
</FORM>

<!--/评论表单 -->
</div>