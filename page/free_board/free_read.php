<?php
include "../../db.php"; /* db load */

if(isset($_SESSION['userid'])){

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
  <title>프로듀스SM 자유게시판</title>
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
			<li class="nav-item active">
				<a class="nav-link" href="../../page/evaluation.php">강의평가 <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../../page/trade.php">강의교환</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../../page/list.php">자유게시판</a>
			</li>
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
		<br><br><h5><?php echo $free_board['title']; ?></h5>
		<div id="user_info">
			<?php echo $free_board['date']; ?> 조회:<?php echo $free_board['hit']; ?>
				<div id="bo_line"></div>
			</div>
			<div style="padding-top:10px;">
			파일 : <a href="../../upload/<?php echo $board['file'];?>" download><?php echo $free_board['file']; ?></a>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$free_board[content]"); ?>
			</div>

	<!-- 목록, 수정, 삭제 -->
		<div id="bo_ser">
			<ul>
				<li><a href="../list.php">[목록으로]</a></li>
				<?php
					if($_SESSION['userid'] == $free_board['name'])
						{  ?>
						<li><a href="free_modify.php?idx=<?php echo $bno; ?>">[수정]</a></li>
						<li><a href="free_delete.php?idx=<?php echo $bno; ?>">[삭제]</a></li>
					<?php }else{ }?>
			</ul>
		</div>
<!--- 댓글 불러오기 -->
<div class="reply_view">
	<h5>댓글목록</h5>
		<?php
			$sql3 = mq("select * from free_reply where con_num='".$bno."' order by idx asc");
			while($free_reply = $sql3->fetch_array()){
		?>
		<div class="dap_lo">
			<div><b>학생</b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$free_reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $free_reply['date']; ?></div>
			<div class="rep_me rep_menu">
				<?php
					if($_SESSION['userid'] == $free_reply['name'])
						{  ?>
							<a class="dat_edit_bt">수정</a>
							<a href="free_reply_delete.php?idx=<?php echo $free_reply['idx']; ?>">삭제</a>
					<?php }else{ }?>
			</div>
			<!-- 댓글 수정 폼 dialog -->
			<div class="dat_edit">
				<form method="post" action="free_rep_modify_ok.php">
					<input type="hidden" name="rno" value="<?php echo $free_reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
					<textarea name="content" class="dap_edit_t"><?php echo $free_reply['content']; ?></textarea>
					<input type="submit" value="수정하기" class="re_mo_bt">
				</form>
			</div>
		</div>
	<?php } ?>

	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<ul>
			<li class="fl"><textarea name="content" class="free_reply_content" id="re_content" cols="100" rows="3"></textarea></li>
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
				url: 'free_reply_ok.php?idx=<?php echo $bno; ?>',
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
</body>
</html>
<?php
}else{
echo "<script>alert('잘못된 접근입니다.'); location.href='../../index.php'; </script>";
	}
?>
