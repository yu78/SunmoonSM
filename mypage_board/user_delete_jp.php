<?php
	include "../../db.php";
	if(isset($_SESSION['userid'])){

	$sql = mq("delete from member where id='".$_SESSION['userid']."'");
	echo "<script>alert('脱退しました。');</script>";
  session_destroy();
	}else{
  echo "<script>alert('ログインが必要です。'); location.href='../../index_jp.php'; </script>";
	}
?>
<meta http-equiv="refresh" content="0 url=../../index_jp.php" />
