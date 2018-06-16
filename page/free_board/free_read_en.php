<?php
include "../../db.php"; /* db load */

if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){

	$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
	$hit = mysqli_fetch_array(mq("select * from free_board where idx ='".$bno."'"));
	$hit = $hit['hit'] + 1;
	$fet = mq("update free_board set hit = '".$hit."' where idx = '".$bno."'");
	$sql = mq("select * from free_board where idx='".$bno."'"); /* 받아온 idx값을 선택 */
	$free_board = $sql->fetch_array();
?>
<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>ProduceSM Bulletin board</title>
  <link rel="stylesheet" href="../../css/board.css" />
  <link rel="stylesheet" href="../../css/jquery-ui.css" />
  <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../../js/jquery-ui.js"></script>
	<!-- 합쳐지고 최소화된 최신 CSS -->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<!-- 부가적인 테마 -->
	<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
	<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
	<script src="../../js/bootstrap.min.js"></script>
	<!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
	<!-- 반응형 -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
	/* 반응형 */
	@media ( max-width: 767px ) {
		#board_read {
			width: auto;
		}
	}
	</style>
	<style>
	th{
		text-align: center;
	}
	</style>
	<style>
	td{
		text-align: center;
	}
	</style>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<a class="navbar-brand" href="../../../index_en.php">ProduceSM</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarColor01">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="../../page/evaluation_en.php">Evaluation</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../../page/trade_en.php">Trade</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="../../page/list_en.php">Bulletin board<span class="sr-only">(current)</span></a>
			</li>
			<?php if($_SESSION['level']==5) { ?>
			 <li class="nav-item">
				 <a class="nav-link" href="../../page/admin/adminlist.php">Admin</a>
			 </li>
		 <?php }?>
			<li class="nav-item">
				<a class="nav-link" href="../../page/mypage_en.php">Mypage</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../../member/logout_en.php">LogOut</a>
			</li>
		</ul>
	</div>
</nav>
<body>
	<!-- 글 불러오기 -->
	<div id="board_read">
			<br><br><h5><?php echo $free_board['title']; ?></h5>
			<div id="user_info">
				<?php echo $free_board['date']; ?> hit:<?php echo $free_board['hit']; ?>
					<div id="bo_line"></div>
				</div>
				<div style="padding-top:10px;">
				File : <a href="../../upload/<?php echo $free_board['file'];?>" download><?php echo $free_board['file']; ?></a>
				</div>
				<div id="bo_content">
					<?php echo nl2br("$free_board[content]"); ?>
				</div>

	<!-- 목록, 수정, 삭제 -->
		<div id="bo_ser">
			<ul>
				<?php $referer_domain = $_SERVER['HTTP_REFERER']; ?>
				<li><a href="<?php echo $referer_domain;?>">[List of posts]</a></li>
				<?php
					if(($_SESSION['userid'] == $free_board['name'])||$_SESSION['level']==5) {
				?>
				<li><a onclick="return confirm('Do you want to modify?')" href="free_modify_en.php?idx=<?php echo $bno; ?>">[modify]</a></li>
				<li><a onclick="return confirm('Do you want to delete?')" href="free_delete_en.php?idx=<?php echo $bno; ?>">[delete]</a></li>
					<?php }else{ }?>
			</ul>
		</div>
<!--- 댓글 불러오기 -->
<div class="reply_view">
	<h5>List of comments</h5>
		<?php
			$sql3 = mq("select * from free_reply where con_num='".$bno."' order by idx asc");
			while($free_reply = $sql3->fetch_array()){
		?>
		<div class="dap_lo">
			<div><b>Student</b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$free_reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $free_reply['date']; ?></div>
			<div class="rep_me rep_menu">
				<?php
				if(($_SESSION['userid'] == $free_reply['name'])||$_SESSION['level']==5) {
				?>
							<a class="dat_edit_bt">Modify</a>
							<a href="free_reply_delete_en.php?idx=<?php echo $free_reply['idx']; ?>">Delete</a>
					<?php }else{ } ?>
			</div>
			<!-- 댓글 수정 폼 dialog -->
			<div class="dat_edit">
				<form method="post" action="free_rep_modify_ok_en.php">
					<input type="hidden" name="rno" value="<?php echo $free_reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
					<textarea name="content" class="dap_edit_t"><?php echo $free_reply['content']; ?></textarea>
					<input type="submit" value="modify" class="re_mo_bt">
				</form>
			</div>
		</div>
	<?php } ?>

	<!--- 댓글 입력 폼 -->
	<div class="dap_ins" >
		<ul>
			<li class="fl"><textarea name="content" class="free_reply_content" id="re_content" cols="100" rows="3"></textarea></li>
			<li><input type="button" id="rep_bt" value="reply" class="re_bt" /></li>
		</ul>
	</div>
</div><!--- 댓글 불러오기 끝 -->
</div>

<!-- 댓글 입력 스크립트 -->
<script type="text/javascript">
$(document).ready(function(){
	$(".re_bt").click(function(){
		var rep_content = $("#re_content");
			$.ajax({
				type: 'post',
				url: 'free_reply_ok_en.php?idx=<?php echo $bno; ?>',
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
<!-- footer -->
<div style="position:fixed; left:0px; bottom:0px; height:30px; width:100%; background:rgb(120, 194, 173);(120, 194, 173); color: white;">
	<p style="text-align:center; top:10px;">Copyright ⓒ ProduceSM. All rights reserved.</p>
</div>
</body>
</html>
<?php
		}else if((isset($_SESSION['userid'])&&($_SESSION['state']=='0'))){
				echo "<script>alert('You can use it after authentication on My Page.'); location.href='../../page/list_en.php'; </script>";
    }else{
			echo "<script>alert('Login is required'); location.href='../../page/list_en.php'; </script>";
    }
?>
