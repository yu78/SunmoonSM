<?php
	include "../../db.php";

	if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){
	$bno = $_GET['idx'];
	$date = date('Y-m-d');
	$sql = mq("insert into trade_reply(con_num,name,content,date) values('".$bno."','".$_SESSION['userid']."','".$_POST['content']."','".$date."')");
?>
		<h5>Reply List</h5>
		<?php
			$sql3 = mq("select * from trade_reply where con_num='".$bno."' order by idx asc");
			while($trade_reply = $sql3->fetch_array()){
		?>
		<div class="dap_lo">
			<div><b><?php echo $trade_reply['name'];?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$trade_reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $trade_reply['date']; ?></div>
			<div class="rep_me rep_menu">
				<?php
					if($_SESSION['userid'] == $trade_reply['name'])
						{  ?>
							<a class="dat_edit_bt">Modify</a>
							<a href="trade_reply_delete_en.php?idx=<?php echo $trade_reply['idx']; ?>">Delete</a>
					<?php }else{ }?>
			</div>
			<!-- 댓글 수정 폼 dialog -->
			<div class="dat_edit">
				<form method="post" action="trade_rep_modify_ok_en.php">
					<input type="hidden" name="rno" value="<?php echo $trade_reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
					<textarea name="content" class="dap_edit_t"><?php echo $trade_reply['content']; ?></textarea>
					<input type="submit" value="Modify" class="re_mo_bt">
				</form>
			</div>
		</div>
	<?php } ?>

	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<ul>
			<li class="fl"><textarea name="content" class="trade_reply_content" id="re_content" cols="100" rows="3"></textarea></li>
			<li><input type="button" id="rep_bt" value="Reply" class="re_bt" /></li>
		</ul>
	</div>

<!-- 댓글 입력 스크립트 -->
<script type="text/javascript">
$(document).ready(function(){
	$(".re_bt").click(function(){
		var rep_content = $("#re_content");
			$.ajax({
				type: 'post',
				url: 'trade_reply_ok_en.php?idx=<?php echo $bno; ?>',
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
				echo "<script>alert('You can use it after authentication on My Page.'); location.href='../../page/trade_en.php'; </script>";
    }else{
			echo "<script>alert('Login is required'); location.href='../../page/trade_en.php'; </script>";
    }
?>
