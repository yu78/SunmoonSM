<?php
include "../../db.php"; /* db load */

if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){

	$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
	$hit = mysqli_fetch_array(mq("select * from trade_board where idx ='".$bno."'"));
	$hit = $hit['hit'] + 1;
	$fet = mq("update trade_board set hit = '".$hit."' where idx = '".$bno."'");
	$sql = mq("select * from trade_board where idx='".$bno."'"); /* 받아온 idx값을 선택 */
	$trade_board = $sql->fetch_array();
?>
<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>프로듀스SM 강의교환</title>
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
	<a class="navbar-brand" href="../../../index.php">프로듀스SM</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarColor01">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="../../page/evaluation.php">강의평가</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="../../page/trade.php">강의교환 <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../../page/list.php">자유게시판</a>
			</li>
			 <?php if($_SESSION['level']==5) { ?>
				<li class="nav-item">
					<a class="nav-link" href="../../page/admin/adminlist.php">관리자</a>
				</li>
			<?php }?>
			 <li class="nav-item">
				 <a class="nav-link" href="../../page/mypage.php">마이페이지</a>
			 </li>
			 <li class="nav-item">
				 <a class="nav-link" href="../../member/logout.php">로그아웃</a>
			 </li>
		</ul>
	</div>
</nav>
<body>
<!-- 글 불러오기 -->
<div id="board_read">
	<br><br><h5>[<?php echo $trade_board['trade_header']; ?>] <?php echo $trade_board['title']; ?></h5>
		<div id="user_info">
			<?php echo $trade_board['name'];?>
			<br><?php echo $trade_board['date']; ?> 조회:<?php echo $trade_board['hit']; ?>
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$trade_board[content]"); ?>
			</div>

	<!-- 목록, 수정, 삭제 -->
		<div id="bo_ser">
			<ul>
				<?php $referer_domain = $_SERVER['HTTP_REFERER']; ?>
				<li><a href="<?php echo $referer_domain;?>">[목록으로]</a></li>
				<?php
					if(($_SESSION['userid'] == $trade_board['name'])||$_SESSION['level']==5) {
				  ?>
					<li><a onclick="return confirm('수정하시겠습니까?')" href="trade_modify.php?idx=<?php echo $bno; ?>">[수정]</a></li>
					<li><a onclick="return confirm('삭제하시겠습니까?')" href="trade_delete.php?idx=<?php echo $bno; ?>">[삭제]</a></li>
					<?php } else{ }?>
			</ul>
		</div>
<!--- 댓글 불러오기 -->
<div class="reply_view">
	<h5>댓글목록</h5>
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
					if(($_SESSION['userid'] == $trade_reply['name'])||$_SESSION['level']==5) {
				?>
							<a class="dat_edit_bt">수정</a>
							<a href="trade_reply_delete.php?idx=<?php echo $trade_reply['idx']; ?>">삭제</a>
					<?php }else{ }?>
			</div>
			<!-- 댓글 수정 폼 dialog -->
			<div class="dat_edit">
				<form method="post" action="trade_rep_modify_ok.php">
					<input type="hidden" name="rno" value="<?php echo $trade_reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
					<textarea name="content" class="dap_edit_t"><?php echo $trade_reply['content']; ?></textarea>
					<input type="submit" value="수정하기" class="re_mo_bt">
				</form>
			</div>
		</div>
	<?php } ?>

	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<ul>
			<li class="fl"><textarea name="content" class="trade_reply_content" id="re_content" cols="100" rows="3"></textarea></li>
			<li><input type="button" id="rep_bt" value="댓글" class="re_bt" /></li>
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
				url: 'trade_reply_ok.php?idx=<?php echo $bno; ?>',
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
	<p style="text-align:center; top:10px;">Copyright ⓒ 프로듀스SM. All rights reserved.</p>
</div>
</body>
</html>
<?php
		}else if((isset($_SESSION['userid'])&&($_SESSION['state']=='0'))){
				echo "<script>alert('마이페이지에서 인증 후 사용하실 수 있습니다.'); location.href='../../page/trade.php'; </script>";
    }else{
			echo "<script>alert('로그인이 필요합니다.'); location.href='../../page/trade.php'; </script>";
    }
?>
