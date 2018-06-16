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
   <a class="navbar-brand" href="../../../index_jp.php">プロデュースSM</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
     <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse" id="navbarColor01">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
         <a class="nav-link" href="../../page/evaluation_jp.php">講義評価</a>
       </li>
       <li class="nav-item active">
         <a class="nav-link" href="../../page/trade_jp.php">講義交換 <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="../../page/list_jp.php">掲示板</a>
       </li>
        <?php if($_SESSION['level']==5) { ?>
         <li class="nav-item">
           <a class="nav-link" href="../../page/admin/adminlist.php">管理者</a>
         </li>
       <?php }?>
        <li class="nav-item">
          <a class="nav-link" href="../../page/mypage_jp.php">私のページ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../member/logout_jp.php">ログアウト</a>
        </li>
     </ul>
   </div>
 </nav>
 <body>
    <div id="board_write" style="margin-bottom:50px;">
            <div id="write_area">
              <h3>講義交換</h3>
              <small>文を修正します。</small>
                <form action="trade_modify_ok_jp.php/<?php echo $trade_board['idx']; ?>" method="post">
                    <input type="hidden" name="idx" value="<?=$bno?>">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" class="form-control" placeholder="제목" maxlength="100" style="margin-bottom:10px;" required><?php echo $trade_board['title']; ?></textarea>
                    </div>
                    <div id="in_header">
                        <select name="trade_header" id="uheader" rows="1" cols="55" class="form-control" maxlength="100" required>
													<option value="원해요">欲しいです</option>
														<option value="드려요">致します</option>
															<option value="교환해요">交換しましょう</option>
												</select>
                    </div>
                    <div id="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" cols="110" class="form-control" placeholder="내용" required><?php echo $trade_board['content']; ?></textarea>
                    </div>
                  <div style="margin-top:10px;">
                    <button class="btn btn-info">書き込み</button>
										<button type="button" class="btn btn-secondary" onClick="history.back();">キャンセル</button>
                  </div>
                </form>
            </div>
        </div>
        <!-- footer -->
  			<div style="position:fixed; left:0px; bottom:0px; height:30px; width:100%; background:rgb(120, 194, 173);(120, 194, 173); color: white;">
  	      <p style="text-align:center; top:10px;">Copyright ⓒ プロデュースSM. All rights reserved.</p>
  	    </div>
    </body>
</html>
<?php
		}else if((isset($_SESSION['userid'])&&($_SESSION['state']=='0'))){
				echo "<script>alert('マイページで認証後に使用することができます。'); location.href='../../page/trade_jp.php'; </script>";
    }else{
			echo "<script>alert('ログインが必要です。'); location.href='../../page/trade_jp.php'; </script>";
    }
?>
