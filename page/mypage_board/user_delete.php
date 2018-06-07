<?php
	include "../../db.php";
	if(isset($_SESSION['userid'])){

	$sql = mq("delete from member where id='".$_SESSION['userid']."'");
	echo "<script>alert('탈퇴되었습니다.');</script>";
  session_destroy();
	}else{
  echo "<script>alert('로그인이 필요합니다.'); location.href='../../index.php'; </script>";
	}
?>
<meta http-equiv="refresh" content="0 url=../../index.php" />
