<?php
	include "../../db.php";

	if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){
	$bno = $_GET['idx'];
	$date = date('Y-m-d');
	$sql = mq("insert into free_reply(con_num,name,content,date) values('".$bno."','".$_SESSION['userid']."','".$_POST['content']."','".$date."')");
?>
		<h5>コメント</h5>
		<?php
			$sql3 = mq("select * from free_reply where con_num='".$bno."' order by idx asc");
			while($free_reply = $sql3->fetch_array()){
		?>
		<div class="dap_lo">
			<div><b>学生</b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$free_reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $free_reply['date']; ?></div>
			<div class="rep_me rep_menu">
				<?php
					if(($_SESSION['userid'] == $free_reply['name'])||$_SESSION['level']==5)
						{  ?>
							<a class="dat_edit_bt">修正</a>
							<a href="free_reply_delete_jp.php?idx=<?php echo $free_reply['idx']; ?>">削除</a>
					<?php }else{ }?>
			</div>
			<!-- 댓글 수정 폼 dialog -->
			<div class="dat_edit">
				<form method="post" action="free_rep_modify_ok_jp.php">
					<input type="hidden" name="rno" value="<?php echo $free_reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
					<textarea name="content" class="dap_edit_t"><?php echo $free_reply['content']; ?></textarea>
					<input type="submit" value="修正" class="re_mo_bt">
				</form>
			</div>
		</div>
	<?php } ?>

	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<ul>
			<li class="fl"><textarea name="content" class="reply_content" id="re_content" cols="100" rows="3"></textarea></li>
			<li><input type="button" id="rep_bt" value="コメント" class="re_bt" /></li>
		</ul>
	</div>

<!-- 댓글 입력 스크립트 -->
<script type="text/javascript">
$(document).ready(function(){
	$(".re_bt").click(function(){
		var rep_content = $("#re_content");
			$.ajax({
				type: 'post',
				url: 'free_reply_ok_jp.php?idx=<?php echo $bno; ?>',
				data : rep_content,
				dataType : 'html',
				success: function(data){
					$(".reply_view").html(data);
					$(".reply_content").val('');
				}
			});
		});
	$(".dat_edit_bt").click(function(){
			var obj = $(this).closest(".dap_lo").find(".dat_edit");
			obj.dialog({
				modal:true,
				width:650,
				height:180,
				title:"댓글 수정"});
		});
	});
</script>
<?php
		}else if((isset($_SESSION['userid'])&&($_SESSION['state']=='0'))){
				echo "<script>alert('マイページで認証後に使用することができます。'); location.href='../../page/list_jp.php'; </script>";
    }else{
			echo "<script>alert('ログインが必要です。'); location.href='../../page/list_jp.php'; </script>";
    }
?>
