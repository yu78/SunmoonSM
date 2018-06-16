<?php
	include "../../db.php";
	if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){
	header('Content-Type: text/html; charset=utf-8');

	$bno = $_GET['idx'];
	$sql = mq("delete from evaluation where idx='$bno';");
	echo "<script>alert('削除がされました。');</script>";
	}else{
	header('Content-Type: text/html; charset=utf-8');
echo "<script>alert('ログインが必要です。'); location.href='../index_jp.php'; </script>";
	}
?>
<meta http-equiv="refresh" content="0 url=../evaluation_jp.php" />
