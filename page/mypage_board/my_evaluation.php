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
 <!-- 부트스트랩 CSS 추가하기 -->
 <link rel="stylesheet" href="../../css/bootstrap.min.css">
 <!-- 커스텀 CSS 추가하기 -->
 <link rel="stylesheet" href="../../css/custom.css">
 <!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
 <script src="../../js/scroll_top.js"></script>
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
	<div class="container">
		<br><br><h2>마이페이지</h2><br>
		<div class="btn-group-vertical" style="float:left; height:auto;">
  		<a class="btn btn-success" href="user_information.php">유저정보</a>
  		<a class="btn btn-success" href="my_evaluation.php">평가한 강의</a>
			<a class="btn btn-success" href="my_trade.php">작성한 교환</a>
  		<a class="btn btn-success" href="my_list.php">작성한 글</a>
  		<a class="btn btn-success" href="my_reply.php">작성한 댓글</a>
  		<a class="btn btn-success" href="my_bookmark.php">북마크</a>
		</div>
	</div>

<ui>
	<?php
		$result = mq("SELECT * FROM evaluation where name='".$_SESSION['userid']."' order by idx desc");
		while($evaluation = mysqli_fetch_array($result)){
	?>
	<div class="card bg-light mt-3" style="padding: 10px;">
		<div class="card-header bg-light">
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
			</div>
		</div>
	</div>
	<?php } ?>
</div>
</ui>
	<!-- footer -->
	<div class="container" style="padding-top:100px;">
		<p class="text-center">Copyright ⓒ 프로듀스SM. All rights reserved.</p>
	</div>
	<div>
		<a href="#" id="toTop" style="position:fixed;bottom:100px;right:100px;"><img src="../../img/top_button.png"></a>
	</div>
</body>
</html>
<?php
    }else{
        echo "<script>alert('잘못된 접근입니다.'); location.href='../../index.php'; </script>";
    }
 ?>
