<?php
	include "../../db.php";
    if(isset($_SESSION['userid'])){
?>
<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>프로듀스SM 강의평가</title>
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
	<div id="board_write">
					<div id="write_area">
        <h5 id="modal">평가 등록</h5>
        <form action="./evaluation_write_ok.php" method="post">
              <label>강의명</label>
              <input type="text" name="lectureName" class="form-control" style="" required>
              <label>교수명</label>
              <input type="text" name="professorName" class="form-control" style="" required>
              <label>수강 연도</label>
              <select name="lectureYear" class="form-control">
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
              <label>수강 학기</label>
              <select name="semesterDivide" class="form-control">
                <option name="1학기">1학기</option>
                <option name="여름학기">여름학기</option>
                <option name="2학기">2학기</option>
                <option name="겨울학기">겨울학기</option>
              </select>
              <label>강의 구분</label>
              <select name="lectureDivide" class="form-control">
                <option name="전공">전공</option>
                <option name="교양">교양</option>
                <option name="기타">기타</option>
              </select>
            <label>제목</label>
            <input type="text" name="title" class="form-control" required>
            <label>내용</label>
            <textarea type="text" name="content" class="form-control" style="height: 180px;" required></textarea>
              <label>총점</label>
              <select name="totalScore">
								<option value="A+">A+</option>
                <option value="A">A</option>
                <option value="B+">B+</option>
                <option value="B">B</option>
                <option value="C+">C+</option>
								<option value="C">C</option>
								<option value="D+">D+</option>
								<option value="D">D</option>
								<option value="F">F</option>
              </select>
              <label>학점</label>
              <select name="creditScore">
								<option value="A+">A+</option>
                <option value="A">A</option>
                <option value="B+">B+</option>
                <option value="B">B</option>
                <option value="C+">C+</option>
								<option value="C">C</option>
								<option value="D+">D+</option>
								<option value="D">D</option>
								<option value="F">F</option>
              </select>
              <label>출석</label>
              <select name="comfortableScore">
								<option value="A+">A+</option>
                <option value="A">A</option>
                <option value="B+">B+</option>
                <option value="B">B</option>
                <option value="C+">C+</option>
								<option value="C">C</option>
								<option value="D+">D+</option>
								<option value="D">D</option>
								<option value="F">F</option>
              </select>
              <label>난이도</label>
              <select name="lectureScore">
								<option value="A+">A+</option>
                <option value="A">A</option>
                <option value="B+">B+</option>
                <option value="B">B</option>
                <option value="C+">C+</option>
								<option value="C">C</option>
								<option value="D+">D+</option>
								<option value="D">D</option>
								<option value="F">F</option>
              </select>
            <button type="button" class="btn btn-secondary" onClick="history.back();">취소</button>
            <button type="submit" class="btn btn-info">등록하기</button>
        </form>
			</div>
	</div>
	<!-- footer -->
	<div class="container" style="padding-top:100px;">
		<p class="text-center">Copyright ⓒ 프로듀스SM. All rights reserved.</p>
	</div>
</body>
</html>
<?php
}else{
header('Content-Type: text/html; charset=utf-8');
echo "<script>alert('잘못된 접근입니다.'); location.href='../../index.php'; </script>";
}
?>
