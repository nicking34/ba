<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
	$(function(){
		$(".comment_list").submit(function(){
			var form = $(".commentForm");
			var fid = form.find("input").filter('[name=fid]').val();						
			var content = form.find("textarea").val();				
			$.post("/ba/index.php/Feed/insertComment",{
				fid:fid,
				content:content
			},function(data,textStatus){
				var mycomment = data.content;
				var myname = "我";
				var myfloor = data.floor;
				var txtHtml ="<div class='comment_box'><a href='javascript:void(0)'>"+myname
				+" : </a><p class='comment_content'>"+mycomment
				+"</p><span class='comment_floor'>"+myfloor+"楼</span></div>";
				$(".addComment").append(txtHtml);
			},"json")
		})
	})


</script>


<!-- 评论列表 -->
<div class="comment_list">
<?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$re): $mod = ($i % 2 );++$i;?><div class="comment_box">
<a href="__APP__/User/showUser/<?php echo ($re["uid"]); ?>" class="username"><?php echo ($re["uname"]); ?> : </a>
<p class="comment_content"><?php echo ($re["content"]); ?>--fid:<?php echo ($fid); ?>--<?php echo (session('uname')); ?></p>
<span class="comment_floor"><?php echo ($re["floor"]); ?>楼</span>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
<p class="addComment"></p>
<!-- /评论列表 -->

<!-- 评论表单 -->
<FORM  class="commentForm" action="javascript:void(0)">
<input type="hidden" name='fid' value=<?php echo ($fid); ?>>
<textarea  name="content">发布评论</textarea>
<input class="commentBtn" type="submit" value="评论">
<p></p>
</FORM>

<!--/评论表单 -->
</div>