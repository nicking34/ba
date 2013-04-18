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

<FORM  class="commentForm" action="javascript:void(0)">
<input type="hidden" name='fid' value=<?php echo ($data); ?>>
<input type="hidden" name='uid' value='<?php echo (session('uid')); ?>'>
<textarea  name="content">发布评论</textarea>
<input class="commentBtn" type="submit" value="评论">
<p></p>
</FORM>