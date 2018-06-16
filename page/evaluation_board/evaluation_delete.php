<?php
	include "../../db.php";
	if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){
	header('Content-Type: text/html; charset=utf-8');

	$bno = $_GET['idx'];
	$sql = mq("delete from evaluation where idx='$bno';");
	echo "<script>alert('삭제되었습니다.');</script>";
	}else{
	header('Content-Type: text/html; charset=utf-8');
echo "<script>alert('로그인이 필요합니다.'); location.href='../index.php'; </script>";
	}
?>
<meta http-equiv="refresh" content="0 url=../evaluation.php" />
