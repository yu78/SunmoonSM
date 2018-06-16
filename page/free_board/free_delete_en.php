<?php
	include "../../db.php";
	if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){
	header('Content-Type: text/html; charset=utf-8');

	$bno = $_GET['idx'];
	$sql = mq("delete from free_board where idx='$bno';");
	echo "<script>alert('It has been deleted.');</script>";
	}else{
	header('Content-Type: text/html; charset=utf-8');
echo "<script>alert('Login is required'); location.href='../index_en.php'; </script>";
	}
?>
<meta http-equiv="refresh" content="0 url=../list_en.php" />
