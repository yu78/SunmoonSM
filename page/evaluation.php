<?php
	include "../db.php";
	if(isset($_SESSION['userid'])){
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>프로듀스SM</title>
    <link rel="stylesheet" href="../css/top_menu.css">
    <link rel="stylesheet" href="../css/evaluation.css">
</head>
<body>
	<h3><a href="../index.php"><img src="../img/프로듀스SM로고.png"></a></h3>
  <nav id="topMenu">
		<ul class="center">
		<li><a class="menuLink" href="../page/evaluation.php">강의평가</a></li>
		<li><a class="menuLink" href="../page/trade.php">강의교환</a></li>
		<li><a class="menuLink" href="../page/list.php">자유게시판</a></li>
		</ul>
  </nav>
	<br><br><h1>강의평가게시판</h1>
</body>
</html>
<?php
    }else{
        echo "<script>alert('잘못된 접근입니다.'); location.href='../index.php'; </script>";
    }
 ?>
