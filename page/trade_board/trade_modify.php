<!--- 게시글 수정 -->
<?php
    header('Content-Type: text/html; charset=utf-8');
	include "../../db.php";
    if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){

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
  <!-- 반응형 -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
  /* 반응형 */
  @media ( max-width: 767px ) {
    #board_write {
      width: auto;
    }
  }
  </style>
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
       <li class="nav-item">
         <a class="nav-link" href="../../page/evaluation.php">강의평가</a>
       </li>
       <li class="nav-item active">
         <a class="nav-link" href="../../page/trade.php">강의교환 <span class="sr-only">(current)</span></a>
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
              <h3>강의교환</h3>
              <small>글을 수정합니다.</small>
                <div id="icon">
                    <!--- 준비중 -->
                </div>
                <form action="trade_modify_ok.php/<?php echo $trade_board['idx']; ?>" method="post">
                    <input type="hidden" name="idx" value="<?=$bno?>">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" class="form-control" placeholder="제목" maxlength="100" style="margin-bottom:10px;" required><?php echo $trade_board['title']; ?></textarea>
                    </div>
                    <div id="in_header">
                        <select name="trade_header" id="uheader" rows="1" cols="55" class="form-control" maxlength="100" required>
													<option value="원해요">원해요</option>
														<option value="드려요">드려요</option>
															<option value="교환해요">교환해요</option>
												</select>
                    </div>
                    <div id="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" cols="110" class="form-control" placeholder="내용" required><?php echo $trade_board['content']; ?></textarea>
                    </div>
                  <div style="margin-top:10px;">
                    <button class="btn btn-info">글 작성</button>
										<button type="button" class="btn btn-secondary" onClick="history.back();">취소</button>
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
				echo "<script>alert('마이페이지에서 인증 후 사용하실 수 있습니다.'); location.href='../../page/trade.php'; </script>";
    }else{
			echo "<script>alert('로그인이 필요합니다.'); location.href='../../page/trade.php'; </script>";
    }
?>
