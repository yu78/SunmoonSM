<?php
	include "../db.php";
	if(isset($_SESSION['userid'])){
?>
<!doctype html>
<html>
	<head>
    <meta charset="utf-8">
    <title>프로듀스SM</title>
		<meta name="viewport" content="wideth=device-width, initial-scale=1"> <!-- 반응형 -->
		<link rel="stylesheet" href="../css/board.css" />
		<!-- 합쳐지고 최소화된 최신 CSS -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<!-- 부가적인 테마 -->
		<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
		<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
		<script src="../js/bootstrap.min.js"></script>
		<!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
		<script src="../js/side_bar.js"></script>
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
  <a class="navbar-brand"href="../index_jp.php">プロデュースSM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../page/evaluation_jp.php">講義評価</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../page/trade_jp.php">講義交換</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../page/list_jp.php">掲示板</a>
      </li>
			 <?php if($_SESSION['level']==5) { ?>
				<li class="nav-item">
					<a class="nav-link" href="../page/admin/adminlist.php">管理者</a>
				</li>
			<?php }?>
			 <li class="nav-item active">
				 <a class="nav-link" href="../page/mypage_jp.php">私のページ <span class="sr-only">(current)</span></a>
			 </li>
			 <li class="nav-item">
				 <a class="nav-link" href="../member/logout_jp.php">ログアウト</a>
			 </li>
    </ul>
	</div>
</nav>
<body>
	<div id="board_area">
		<br><br><h2>私のページ</h2><br>
		 <!-- class="btn-group-vertical" -->
		 <table>
			 <thead>
				 <tr>
					 <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="./mypage_board/user_information_jp.php">ユーザー情報</td>
					 <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="./mypage_board/my_evaluation_jp.php">評価した講義</td>
					 <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="./mypage_board/my_trade_jp.php">作成した交換文章</td>
					 <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="./mypage_board/my_list_jp.php">作成した文</td>
					 <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="./mypage_board/my_reply_jp.php">作成したコメント</td>
				 </tr>
			 </thead>
		 </table>
		 <hr />
	</div>
	<!-- footer -->
	<div style="position:fixed; left:0px; bottom:0px; height:30px; width:100%; background:rgb(120, 194, 173);(120, 194, 173); color: white;">
		<p style="text-align:center; top:10px;">Copyright ⓒ プロデュースSM. All rights reserved.</p>
	</div>
</body>
</html>
<?php
    }else{
        echo "<script>alert('ログインが必要です。'); location.href='../index_jp.php'; </script>";
    }
 ?>
