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
<!-- 반응형 -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
/* 반응형 */
@media ( max-width: 767px ) {
	#board_area {
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
      <li class="nav-item">
        <a class="nav-link" href="../../page/list_en.php">Bulletin board</a>
      </li>
			<?php if($_SESSION['level']==5) { ?>
			 <li class="nav-item">
				 <a class="nav-link" href="../../page/admin/adminlist.php">Admin</a>
			 </li>
		 <?php }?>
      <li class="nav-item active">
        <a class="nav-link" href="../../page/mypage_en.php">Mypage<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../member/logout_en.php">LogOut</a>
      </li>
    </ul>
  </div>
</nav>
<body>
	<div id="board_area">
		<br><br><h2>Mypage</h2><br>
		<table>
			<thead>
				<tr>
					<td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="user_information_en.php">User information</td>
					<td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="my_evaluation_en.php">My evaluation</td>
					<td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="my_trade_en.php">My trade</td>
					<td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="my_list_en.php">My post</td>
					<td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="my_reply_en.php">My trade comments</td>
				</tr>
			</thead>
		</table>
		<hr />

			<?php
				$sql = mq("select * from member where id='".$_SESSION['userid']."'");
				$user = $sql->fetch_array();
			?>
				<form method="post">
					<div>
		   			<table class="table table-hover">
		       	<thead>
		       	<tr>
		           <th scope="cols">provision</th>
		           <th scope="cols">content</th>
		       	</tr>
		       	</thead>
		       	<tbody>
		       	<tr>
		           <th scope="row">email</th>
		           <td><?php echo $user['email'].$user['emadress']?></td>
		       </tr>
		       <tr>
		           <th scope="row">college name</th>
		           <td><?php echo $user['college_name']; ?></td>
		       </tr>
		       <tr>
		           <th scope="row">major name</th>
		           <td><?php echo $user['major_name']; ?></td>
		       </tr>
		       <tr>
		           <th scope="row">student_idx</th>
		           <td><?php echo $user['student_idx']; ?></td>
		       </tr>
					 <tr>
		           <th scope="row">state</th>
		           <td><?php echo $user['state']; ?></td>
		       </tr>
		       </tbody>
		   		</table>
		   	</div>
				<?php if($_SESSION['level']==5) { ?>
				<div style="margin-left:auto; margin-right:auto; display:none;">
					<a class="btn btn-secondary my-2 my-sm-0" href="user_delete_en.php">Membership Withdrawal</a>
				</div>
				<?php } else { ?>
				<div style="position: absolute; left: 0;right: 0; margin-left: auto; margin-right: auto; width: 500px;">
					<a class="btn btn-secondary my-2 my-sm-0" onclick="return confirm('Are you sure you want to leave?')" href="user_delete_en.php">Membership Withdrawal</a>
					<a class="btn btn-secondary my-2 my-sm-0" href="../../activation.php">Authenticating</a>
				</div>
				<?php }?>
		</form>
	</div>
	<!-- footer -->
	<div style="position:fixed; left:0px; bottom:0px; height:30px; width:100%; background:rgb(120, 194, 173);(120, 194, 173); color: white;">
		<p style="text-align:center; top:10px;">Copyright ⓒ ProduceSM. All rights reserved.</p>
	</div>
</body>
</html>
<?php
    }else{
        echo "<script>alert('Login is required'); location.href='../../index_en.php'; </script>";
    }
 ?>
