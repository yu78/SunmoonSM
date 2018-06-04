<!--- 게시글 수정 -->
<?php
    header('Content-Type: text/html; charset=utf-8');
	include "../../db.php";
    if(isset($_SESSION['userid'])){

	$bno = $_GET['idx'];
	$sql = mq("select * from trade_board where idx='$bno';");
	$trade_board = $sql->fetch_array();
 ?>
 <!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>프로듀스SM 강의교환</title>
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
              <h3>강의교환</h3>
              <small>글을 수정합니다.</small>
                <div id="icon">
                    <!--- 준비중 -->
                </div>
                <form action="trade_modify_ok.php/<?php echo $trade_board['idx']; ?>" method="post">
                    <input type="hidden" name="idx" value="<?=$bno?>">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" class="form-control" placeholder="제목" maxlength="100" required><?php echo $trade_board['title']; ?></textarea>
                    </div>
                    <div id="in_header">
                        <select name="trade_header" id="uheader" rows="1" cols="55" class="form-control" placeholder="말머리" maxlength="100" required>
													<option>원해요
														<option>드려요
															<option>교환해요
												</select>
                    </div>
                    <div id="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" cols="110" class="form-control" placeholder="내용" required><?php echo $trade_board['content']; ?></textarea>
                    </div>
                    <button class="btn btn-info">글 작성</button>
										<button type="button" class="btn btn-secondary" onClick="history.back();">취소</button>
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
echo "<script>alert('잘못된 접근입니다.'); location.href='../../index.php'; </script>";
    }
?>
