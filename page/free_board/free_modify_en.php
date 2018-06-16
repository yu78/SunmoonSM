<!--- 게시글 수정 -->
<?php
    header('Content-Type: text/html; charset=utf-8');
	include "../../db.php";
    if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){

	$bno = $_GET['idx'];
	$sql = mq("select * from free_board where idx='$bno';");
	$free_board = $sql->fetch_array();
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
   <a class="navbar-brand" href="../../../index_en.php">ProduceSM</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
     <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse" id="navbarColor01">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
         <a class="nav-link" href="../../page/evaluation_en.php">Evaluation</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="../../page/trade_en.php">Trade</a>
       </li>
       <li class="nav-item active">
         <a class="nav-link" href="../../page/list_en.php">Bulletin board<span class="sr-only">(current)</span></a>
       </li>
       <?php if($_SESSION['level']==5) { ?>
        <li class="nav-item">
          <a class="nav-link" href="../../page/admin/adminlist.php">Admin</a>
        </li>
      <?php }?>
       <li class="nav-item">
         <a class="nav-link" href="../../page/mypage_en.php">Mypage</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="../../member/logout_en.php">LogOut</a>
       </li>
     </ul>
   </div>
 </nav>
 <body>
    <div id="board_write" style="margin-bottom:50px;">
            <div id="write_area">
              <h3>Bulletin board</h3>
              <small>Modify the text</small>
                <div id="icon">
                    <!--- 준비중 -->
                </div>
                <form action="free_modify_ok_en.php/<?php echo $free_board['idx']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idx" value="<?=$bno?>">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" class="form-control" placeholder="제목" maxlength="100" required><?php echo $free_board['title']; ?></textarea>
                    </div>
                    <div id="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" cols="110" class="form-control" placeholder="내용" required><?php echo $free_board['content']; ?></textarea>
                    </div>
                    <div id="in_file" style="margin-top:10px; margin-bottom:10px;">
                        <input type="file" name="b_file" />
                    </div>
                    <button class="btn btn-info">Write</button>
										<button type="button" class="btn btn-secondary" onClick="history.back();">cancel</button>
                </form>
            </div>
        </div>
        <!-- footer -->
  			<div style="position:fixed; left:0px; bottom:0px; height:30px; width:100%; background:rgb(120, 194, 173);(120, 194, 173); color: white;">
  	      <p style="text-align:center; top:10px;">Copyright ⓒ ProduceSM. All rights reserved.</p>
  	    </div>
    </body>
</html>
<?php
		}else if((isset($_SESSION['userid'])&&($_SESSION['state']=='0'))){
				echo "<script>alert('You can use it after authentication on My Page.'); location.href='../../page/list_en.php'; </script>";
    }else{
			echo "<script>alert('Login is required'); location.href='../../page/list_en.php'; </script>";
    }
?>
