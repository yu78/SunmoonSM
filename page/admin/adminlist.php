<?php
include "../../db.php";
if($_SESSION['level'] == 5) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ko" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>프로듀스SM</title>
  	<meta name="viewport" content="wideth=device-width, initial-scale=1"> <!-- 반응형 -->
    <link rel="stylesheet" href="../../css/board.css" />
  	<!-- 합쳐지고 최소화된 최신 CSS -->
  	<link rel="stylesheet" href="../../css/bootstrap.min.css">
  	<!-- 부가적인 테마 -->
  	<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
  	<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
  	<script src="../../js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand"href="../../../index.php">프로듀스SM</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../../page/evaluation.php">강의평가</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../page/trade.php">강의교환</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../page/list.php">자유게시판</a>
          </li>
           <?php if($_SESSION['level']==5) { ?>
            <li class="nav-item active">
              <a class="nav-link" href="adminlist.php">관리자 <span class="sr-only">(current)</span></a>
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
    <!-- 테이블 -->
    <div class="container">
			<br><br><h2>관리자</h2>
      <br>
      <table>
        <thead>
          <tr>
            <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="admin_memberlist.php">회원목록</td>
            <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="admin_freeboardlist.php">자유게시판 목록</td>
            <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="admin_tradelist.php">교환게시판 목록</td>
            <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="admin_evaluationlist.php">강의평가 목록</td>
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
    echo "<script>alert('로그인이 필요합니다.'); location.href='../index.php'; </script>";
}
?>
