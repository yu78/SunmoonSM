<?php
	include "../../db.php";
    if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){
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
	<div id="board_write" style="margin-bottom:50px;">
					<div id="write_area">
        <h5 id="modal">평가 등록</h5>
        <form action="./evaluation_write_ok.php" method="post">
              <label>강의명</label>
              <input type="text" name="lectureName" class="form-control" style="" required>
              <label>교수명</label>
              <input type="text" name="professorName" class="form-control" style="" required>
							<label>수강 연도</label>
              <?php
								// 보여질 년도의 범위 - 현재년부터 100년전까지 표시됩니다.
								$yearRange = 5;
								// 선택되어질 년도 - 현재년 기준 20년전의 년도가 선택되어집니다.
								$ageLimit = 5;

								$currentYear = date('Y');
								$startYear = ($currentYear - $yearRange);
								$selectYear = ($currentYear - $ageLimit);
								echo '<select name="lectureYear" class="form-control">';
								foreach (range($currentYear, $startYear) as $year) {
    							$selected = "";
    							if($year == $selectYear) { $selected = " selected"; }
    							echo '<option' . $selected . '>' . $year . '</option>';
								}
								echo '</select>';
								?>
              <label>수강 학기</label>
              <select name="semesterDivide" class="form-control">
                <option value="1학기">1학기</option>
                <option value="여름학기">여름학기</option>
                <option value="2학기">2학기</option>
                <option value="겨울학기">겨울학기</option>
              </select>
              <label>강의 구분</label>
              <select name="lectureDivide" class="form-control">
                <option value="전공">전공</option>
                <option value="교양">교양</option>
                <option value="기타">기타</option>
              </select>
            <label>제목</label>
            <input type="text" name="title" class="form-control" required>
            <label>내용</label>
            <textarea type="text" name="content" class="form-control" style="height: 180px;" required></textarea>
					<div style="margin-top:20px;">
							<label>총점</label>
              <select name="totalScore" class="form-control">
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
              <select name="creditScore" class="form-control">
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
              <select name="comfortableScore" class="form-control">
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
              <select name="lectureScore" style="margin-bottom:10px;" class="form-control">
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
						</div>
					<div style="position: absolute; right: 0; margin-left: auto; margin-bottom: 100px">
            <button type="button" class="btn btn-secondary" onClick="history.back();">취소</button>
            <button type="submit" class="btn btn-info">등록하기</button>
					</div>
				</form>
			</div>
	</div>
	<!-- footer -->
	<div style="position:fixed; left:0px; bottom:0px; height:30px; width:100%; background:rgb(120, 194, 173);(120, 194, 173); color: white;">
		<p style="text-align:center; top:10px;">Copyright ⓒ 프로듀스SM. All rights reserved.</p>
	</div>
</body>
</html>
<?php
		}else if((isset($_SESSION['userid'])&&($_SESSION['state']=='0'))){
				echo "<script>alert('마이페이지에서 인증 후 사용하실 수 있습니다.'); location.href='../../page/evaluation.php'; </script>";
    }else{
			echo "<script>alert('로그인이 필요합니다.'); location.href='../../page/evaluation.php'; </script>";
    }
?>
