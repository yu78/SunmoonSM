<?php
session_start();
include "../db.php";
if($_SESSION['level'] == 5) {
?>
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
    <style type="text/css"></style>
    <!-- <style type="text/css">
      td{color:rgb(180, 180, 180);padding:20px;}
    </style> -->

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
          <?php if(!(isset($_SESSION['userid']))){	?>
            <li class="nav-item">
              <a class="nav-link" onclick="popupLogin();">로그인</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="popupRegister();">회원가입</a>
            </li>
         <?php } else { ?>
           <?php if($_SESSION['level']==5) { ?>
            <li class="nav-item active">
              <a class="nav-link" href="../admin/adminlist.php">관리자 <span class="sr-only">(current)</span></a>
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
      </div>
    </nav>
    <!-- 테이블 -->
    <div class="container">
			<br><br><h2>관리자</h2>
      <br>
      <table>
        <thead>
          <tr>
            <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="admin_memberlist.php">회원목록</td>
            <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="admin_setting.php">설정</td>
          </tr>
        </thead>
      </table>
      <hr />

    <!-- footer -->
    <div style="position:fixed; left:0px; bottom:0px; height:30px; width:100%; background:rgb(120, 194, 173);(120, 194, 173); color: white;">
      <p style="text-align:center; top:10px;">Copyright ⓒ 프로듀스SM. All rights reserved.</p>
    </div>
</div>
  </body>
</html>
<?php
} else{
    echo "<script>alert('잘못된 접근입니다.'); location.href='../index.php'; </script>";
}
?>
