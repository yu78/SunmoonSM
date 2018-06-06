<?php
	include "../db.php";
	if(isset($_SESSION['userid'])){
?>

<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>프로듀스SM</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<!-- 부트스트랩 CSS 추가하기 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- 커스텀 CSS 추가하기 -->
    <link rel="stylesheet" href="../css/custom.css">
		<!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
		<link rel="stylesheet" href="../css/heart.css">
		<script src="../js/scroll_top.js"></script>
		<script src="../js/heart.js"></script>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="../index.php">프로듀스SM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../page/evaluation.php">강의평가 <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../page/trade.php">강의교환</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../page/list.php">자유게시판</a>
      </li>
			<?php if(isset($_SESSION['userid'])){	?>
				<li class="nav-item">
					<a class="nav-link" href="../page/mypage.php">마이페이지</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../member/logout.php">로그아웃</a>
				</li>
			<?php } else { ?>
			<li class="nav-item">
				<a class="nav-link" onclick="popupLogin();">로그인</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" onclick="popupRegister();">회원가입</a>
			</li>
			<?php } ?>
    </ul>

  </div>
</nav>

<body>
    <div class="container">
			<br><br><h2>강의평가</h2>
      <form action="evaluation.php" method="get"  class="form-inline mt-3">
        <select name="lectureDivide" class="form-control">
          <option value="전체">전체</option>
          <option value="전공">전공</option>
          <option value="교양">교양</option>
          <option value="기타">기타</option>
        </select>
        <input type="text" name="search" class="form-control mr-sm-2" placeholder="Search">
				<button type="submit" class="btn btn-secondary my-2 my-sm-0">검색</button>
        <a class="btn btn-secondary my-2 my-sm-0" data-toggle="modal" style="margin-left: 5px;" href="evaluation_board/evaluation_write.php">글쓰기</a>
			</form>

			<ui>
			<?php
				$result = mq("SELECT * FROM evaluation order by idx desc");
				while($evaluation = mysqli_fetch_array($result)){
			?>
			<div class="card bg-light mt-3">
        <div class="card-header bg-light">
					<div class="heart"></div>
          <div class="row">
						<div class="col-8 text-left"><?php echo $evaluation['lectureName']; ?>&nbsp;<small><?php echo $evaluation['professorName']; ?></small></div>
            <div class="col-4 text-right">
              총점 <span style="color: red;"><?php echo $evaluation['totalScore']; ?></span>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h5 class="card-title">
            <?php echo $evaluation['title']; ?>&nbsp;<small>(<?php echo $evaluation['lectureYear']; ?>년 <?php echo $evaluation['semesterDivide']; ?>)</small>
        	</h5>
          <p class="card-text"><?php echo $evaluation['content']; ?></p>
          <div class="row">
            <div class="col-9 text-left">
              학점 <span style="color: red;"><?php echo $evaluation['creditScore']; ?></span>
              출석 <span style="color: red;"><?php echo $evaluation['comfortableScore']; ?></span>
              난이도 <span style="color: red;"><?php echo $evaluation['lectureScore']; ?></span>
            </div>
            <div class="col-3 text-right">
							<?php
								if(($_SESSION['userid'] == $evaluation['name'])||$_SESSION['m_level']==5) {
							?>
							<a onclick="return confirm('수정하시겠습니까?')" href="./evaluation_board/evaluation_modify.php?idx=<?php echo $evaluation['idx']; ?>">수정</a>
							<a onclick="return confirm('삭제하시겠습니까?')" href="./evaluation_board/evaluation_delete.php?idx=<?php echo $evaluation['idx']; ?>">삭제</a>
							<?php }else{ }?>
          	</div>
          </div>
        </div>
      </div>
			<?php } ?>
		</ui>
		<!-- footer -->
		<div class="container" style="padding-top:100px;">
			<p class="text-center">Copyright ⓒ 프로듀스SM. All rights reserved.</p>
		</div>
	<div>
		<a href="#" id="toTop" style="position:fixed;bottom:100px;right:100px;"><img src="../img/top_button.png"></a>
	</div>
	</body>
</html>
<?php
    }else{
        echo "<script>alert('잘못된 접근입니다.'); location.href='../index.php'; </script>";
    }
?>
