<?php include "db.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ko" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>프로듀스SM</title>
	<meta name="viewport" content="wideth=device-width, initial-scale=1"> <!-- 반응형 -->
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<link rel="stylesheet" href="../css/board.css" />
	<!-- 합쳐지고 최소화된 최신 CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- 부가적인 테마 -->
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
	<script src="../js/bootstrap.min.js"></script>
	<!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
	<!-- 반응형 -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
			 width: 600px;
			 margin: 10px auto;
			 margin-top: 10px;
			 margin-bottom: 50px;
			 padding: 20px;
			 border: 1px solid #bcbcbc;
			 text-align: center;
		 }
		 @media ( max-width: 480px ) {
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
			window.open("../member/login.php", "a", "width=500, height=450, left=550, top=100");
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
						<?php if(!(isset($_SESSION['userid']))){	?>
							<li class="nav-item">
				        <a class="nav-link" onclick="popupLogin();">로그인</a>
				      </li>
							<li class="nav-item">
				        <a class="nav-link" onclick="popupRegister();">회원가입</a>
				      </li>
					 <?php } else { ?>
						 <?php if($_SESSION['level']==5) { ?>
 							<li class="nav-item">
 								<a class="nav-link" href="../page/admin/adminlist.php">관리자</a>
 							</li>
 						<?php }?>
						 		<li class="nav-item">
							 		<a class="nav-link" href="../page/mypage.php">마이페이지</a>
						 		</li>
						 <li class="nav-item">
							 <a class="nav-link" href="../member/logout.php">로그아웃</a>
						 </li>
						<?php } ?>
			    </ul>
					<ul class="navbar-nav mr-auto navbar-right">
						<li class="nav-item" style="margin-top:10px;">
							<select style="height:35px;" class="form-control" name="jump" onchange="location.href=this.value">
								<option value="index.php">Language</option>
								<option value="index.php">한글</option>
								<option value="index_en.php">English</option>
								<option value="index_jp.php">日本語</option>
							</select>
						</li>
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
					<li data-target="#myCarousel" data-slide-to="3"></li>
					<li data-target="#myCarousel" data-slide-to="4"></li>
					<li data-target="#myCarousel" data-slide-to="5"></li>
					<li data-target="#myCarousel" data-slide-to="6"></li>
				</ol>
				<!--페이지-->
				<div class="carousel-inner">
					<!--슬라이드1-->
					<div class="item active">
						<img src="../img/img5.png" style="width:100%" alt="First slide">
						<div class="container">
							<div class="carousel-caption">
							</div>
						</div>
					</div>

					<!--슬라이드2-->
					<div class="item">
						<img src="../img/img2.jpg" style="width:100%" data-src="" alt="Second slide">
						<div class="container">
							<div class="carousel-caption">
							</div>
						</div>
					</div>

					<!--슬라이드3-->
					<div class="item">
						<img src="../img/img3.jpg" style="width:100%" data-src="" alt="Third slide">
						<div class="container">
							<div class="carousel-caption">
							</div>
						</div>
					</div>

					<!--슬라이드4-->
					<div class="item">
						<img src="../img/img4.jpg" style="width:100%" data-src="" alt="Fourth slide">
						<div class="container">
							<div class="carousel-caption">
							</div>
						</div>
					</div>

					<!--슬라이드5-->
					<div class="item">
						<img src="../img/img6.jpg" style="width:100%" data-src="" alt="Fifth slide">
						<div class="container">
							<div class="carousel-caption">
							</div>
						</div>
					</div>

					<!--슬라이드6-->
					<div class="item">
						<img src="../img/img7.jpg" style="width:100%" data-src="" alt="Sixth slide">
						<div class="container">
							<div class="carousel-caption">
							</div>
						</div>
					</div>

					<!--슬라이드7-->
					<div class="item">
						<img src="../img/img1.jpg" style="width:100%" data-src="" alt="Seventh slide">
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

			<br>
			<!-- <div class="container" style="margin-bottom:50px;height:auto;width:600px;">
        <p style="text-align:center;font-size:15pt;"><strong>최신강의평가</strong><br></p>
          <div class="card bg-light mt-3">
           	<div class="card-header bg-light">
                //php
            </div>
          </div>
        </div> -->

				<div id="jb-container">
        	<p style="text-align:center;font-size:15pt;"><strong>최신 강의 평가</strong></p>
	     		<?php
          	$result = mq("SELECT * FROM evaluation order by idx desc limit 5");
              while($evaluation = mysqli_fetch_array($result)){
          ?>
          			<?php echo $evaluation['lectureName']?><small>(<?php echo $evaluation['professorName']; ?>)</small> 총점 : <span style="color: red;"><?php echo $evaluation['totalScore']; ?></span><br>
                <?php } ?>
				</div>


			<!-- footer -->
			<div style="position:fixed; left:0px; bottom:0px; height:30px; width:100%; background:rgb(120, 194, 173);(120, 194, 173); color: white;">
	      <p style="text-align:center; top:10px;">Copyright ⓒ 프로듀스SM. All rights reserved.</p>
	    </div>
		</body>
	</html>
