<?php
	include "../../db.php";
	if(isset($_SESSION['userid'])){
?>
<!doctype html>
<html>
<head>
 <meta charset="UTF-8">
 <title>프로듀스SM 마이페이지</title>
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
	<div id="board_area">
		<br><br><h2>마이페이지</h2><br>
		<div class="btn-group-vertical" style="float:left;">
  		<a class="btn btn-success" href="user_information.php">유저정보</a>
  		<a class="btn btn-success" href="my_evaluation.php">평가한 강의</a>
			<a class="btn btn-success" href="my_trade.php">작성한 교환</a>
  		<a class="btn btn-success" href="my_list.php">작성한 글</a>
  		<a class="btn btn-success" href="my_reply.php">작성한 댓글</a>
  		<a class="btn btn-success" href="my_bookmark.php">북마크</a>
		</div>

			<?php
				$sql = mq("select * from member where id='".$_SESSION['userid']."'");
				$user = $sql->fetch_array();
			?>
				<form method="post">
					<div>
		   			<table style="margin-left: auto; margin-right: auto;">
		       	<thead>
		       	<tr>
		           <th scope="cols">항목</th>
		           <th scope="cols">내용</th>
		       	</tr>
		       	</thead>
		       	<tbody>
		       	<tr>
		           <th scope="row">이메일</th>
		           <td><?php echo $user['email'].$user['emadress']?></td>
		       </tr>
		       <tr>
		           <th scope="row">닉네임</th>
		           <td><?php echo $user['name']; ?></td>
		       </tr>
		       <tr>
		           <th scope="row">소속 단과대학</th>
		           <td><?php echo $user['college_name']; ?></td>
		       </tr>
		       <tr>
		           <th scope="row">소속 학과</th>
		           <td><?php echo $user['major_name']; ?></td>
		       </tr>
		       <tr>
		           <th scope="row">학번</th>
		           <td><?php echo $user['student_idx']; ?></td>
		       </tr>
		       </tbody>
		   		</table>
		   	</div>
				<div style="margin-left:auto; margin-right:auto;">
					<a class="btn btn-secondary my-2 my-sm-0" href="user_modify.php">비밀번호변경</a>
					<a class="btn btn-secondary my-2 my-sm-0" href="user_delete.php">회원탈퇴</a>
				</div>
			</form>
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
