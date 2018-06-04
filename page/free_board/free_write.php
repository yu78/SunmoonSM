<?php
	include "../../db.php";
    if(isset($_SESSION['userid'])){
?>
<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>프로듀스SM 자유게시판</title>
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
	 <div id="board_write">
            <div id="write_area">
                <div id="icon">
                    <!--- 준비중 -->
                </div>
                <form action="free_write_ok.php" method="post" enctype="multipart/form-data">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" class="form-control" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div id="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" class="form-control" placeholder="내용" required></textarea>
                    </div>
										<div id="in_file">
           							<input type="file" class="input-group-text" value="1" name="b_file" />
        						</div>
										<button class="btn btn-info">글 작성</button>
										<button type="button" class="btn btn-secondary" onClick="history.back();">취소</button>
                </form>
            </div>
        </body>
    </html>
<?php
}else{
    header('Content-Type: text/html; charset=utf-8');
echo "<script>alert('잘못된 접근입니다.'); location.href='../../index.php'; </script>";
    }
?>
