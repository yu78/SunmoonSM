<?php
	include "../../db.php";
	if(isset($_SESSION['userid'])){
?>
<!doctype html>
<html>
<head>
 <meta charset="UTF-8">
 <title>프로듀스SM 마이페이지</title>
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="../../css/board.css" />
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
	<div id="board_area">
		<br><br><h2>마이페이지</h2><br>
		<div class="btn-group-vertical" style="float:left;">
  		<a class="btn btn-success" href="user_information.php">유저정보</a>
  		<a class="btn btn-success" href="my_evaluation.php">평가한 강의</a>
			<a class="btn btn-success" href="my_trade.php">작성한 교환</a>
  		<a class="btn btn-success" href="my_list.php">작성한 글</a>
  		<a class="btn btn-success" href="my_reply.php">작성한 댓글</a>
  		<a class="btn btn-success" href="my_bookmark.php">북마크</a>
		</div>
	</div>

	<table style="margin-left: auto; margin-right: auto;">
		<thead>
				<tr>
						<th width="50">번호</th>
							<th width="400">댓글</th>
							<th width="100">작성일</th>
					</tr>
			</thead>

			<tbody>
				<tr>
					<td width="50"><?php echo $trade_reply['con_num']; ?></td>
					<td width="400"><?php echo $trade_reply['content']; ?></td>
					<td width="100"><?php echo $trade_reply['date']?></td>
				</tr>
			</tbody>
	</table>
	<div id="page_num">
			<ul>
					<?php
					/* 처음 */

							if($page <= 1){ //만약 page가 1보다 크거나 같다면
									echo "<li class='fo_re'>처음</li>"; //'처음'이라는 fo_re 클래스적용(CSS)
							}else{
									echo "<li><a href=?page=1".$subString.">처음</a></li>"; //아니라면 처음글자에 1번페이지로 갈 수있게 링크
							}

					/* 이전 */

							if($page <= 1){ //만약 page가 1보다 크거나 같다면
						 //아무것도 표시하지 않는다.
							}else{
									echo "<li><a href=?page=$page-1".$subString.">이전</a></li>"; //이전글자에 ?page=$page-1로서 현재 페이지에서 -1한다.
							}

					/* 페이징 번호 */
							for($i=$block_start; $i<=$block_end; $i++){
							//for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
									if($page == $i){ //만약 $page가 $i와 같다면
											echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 fo_re클래스를 적용(CSS)
									}else{
											echo "<li><a href='?page=$i".$subString."'>[$i]</a></li>"; //아니라면 $i를 표시하고 링크에도 $i를 적용한다.
									}
							}

					/* 다음 */
							if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면
							// 빈 값
							}else{
									$next = $page + 1; //next변수에 page + 1을 해준다.
									echo "<li><a href=?page=$next".$subString.">다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
							}

					/* 마지막 */
							if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
									echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
							}else{
									echo "<li><a href=?page=$total_page".$subString.">마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
							}
					?>
			</ul>
	</div>

	<!-- footer -->
	<div class="container" style="padding-top:100px;">
		<p class="text-center">Copyright ⓒ 프로듀스SM. All rights reserved.</p>
	</div>
</body>
</html>
<?php
    }else{
        echo "<script>alert('잘못된 접근입니다.'); location.href='../../index.php'; </script>";
    }
 ?>
