<?php
	include "../db.php";
	if(isset($_SESSION['userid'])){
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>프로듀스SM</title>
    <meta name="viewport" content="wideth=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/main.css">
    <!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
</head>
<body>
	<h3><a href="../index.php"><img src="../img/프로듀스SM로고.png"></a></h3>
  <nav id="topMenu">
    <ul class="center">
      <li><a class="menuLink" href="evaluation.php">강의평가</a></li>
      <li><a class="menuLink" href="trade.php">강의교환</a></li>
      <li><a class="menuLink" href="freeboard.php">자유게시판</a></li>
      <li><a class="menuLink" href="mypage.php">마이페이지</a></li>
      <li><a class="menuLink" href="main.php">로그인</a></li>
    </ul>
  </nav>
    <br><br><h1>마이페이지</h1>
</body>
</html>
<?php
    }else{
        echo "<script>alert('잘못된 접근입니다.'); location.href='../index.php'; </script>";
    }
 ?>
