<?php include "db.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ko" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>프로듀스SM</title>
	<meta name="viewport" content="wideth=device-width, initial-scale=1"> <!-- 반응형 -->
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<!-- 합쳐지고 최소화된 최신 CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- 부가적인 테마 -->
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
	<script src="../js/bootstrap.min.js"></script>
	<!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->

	<!-- 부트스트랩 이미지 슬라이드 -->
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

	<!-- css -->
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
	<style>
	#jb-container {
		width: 940px;
		margin: 10px auto;
		padding: 20px;
	}

	/* 반응형 */
	@media ( max-width: 768px ) {
		#jb-container {
			width: auto;
		}
	}
		</style>

		<!-- 자바 스크립트 -->
		<script language = "javascript">
		// 팝업창 호출
		function popupLogin() {
			//팝업창 가운데 호출 함수가 제대로 안됨 일단은 눈대중으로 가운데 맞춰놨음
			// var windowWidth = 700; //가로
			// var windowHeight = 600; //세로
			// var left = Math.ceil((window.screen.width - windowWidth)/2);
			// var top = Math.ceil((window.screen.height - windowHeight)/2);
			// window.open("signUp.html", "a", "width="+windowWidth+, "height="+windowHeight+, "left="+left+, "top="+top+);}
			window.open("../member/login.php", "a", "width=500, height=600, left=550, top=100");
			}
			function popupRegister() {
				window.open("../member/register.php", "a", "width=550, height=600, left=550, top=30");
			}
			</script>
		</head>
		<body>
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			  <a class="navbar-brand"href="../index.php">프로듀스SM</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarColor01">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item">
			        <a class="nav-link" href="../page/evaluation.php">강의평가</a>
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

			<!-- 이미지 슬라이드 -->
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!--페이지-->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<!--페이지-->
				<div class="carousel-inner">
					<!--슬라이드1-->
					<div class="item active">
						<img src="../img/본관.png" style="width:100%" alt="First slide">
						<div class="container">
							<div class="carousel-caption">
							</div>
						</div>
					</div>

					<!--슬라이드2-->
					<div class="item">
						<img src="../img/자연관.png" style="width:100%" data-src="" alt="Second slide">
						<div class="container">
							<div class="carousel-caption">
							</div>
						</div>
					</div>

					<!--슬라이드3-->
					<div class="item">
						<img src="../img/기숙사.jpg" style="width:100%" data-src="" alt="Third slide">
						<div class="container">
							<div class="carousel-caption">
							</div>
						</div>
					</div>
				</div>
				<!--이전, 다음 버튼-->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>

			<br><br><div class="container">
				<p class="text-right">최신강의평가<br>
				<?php
					$result = mq("SELECT * FROM evaluation order by idx desc limit 3");
					while($evaluation = mysqli_fetch_array($result)){
				?>
				<?php echo $evaluation['lectureName']?><small>(<?php echo $evaluation['professorName']; ?>)</small> 총점 : <span style="color: red;"><?php echo $evaluation['totalScore']; ?></span><br>
				<?php } ?>
				</p>
			</div>
			<!-- footer -->
			<div class="container" style="padding-top:100px;">
				<p class="text-center">Copyright ⓒ 프로듀스SM. All rights reserved.</p>
			</div>
		</body>
	</html>
