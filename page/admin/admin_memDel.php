<?php
	include "../../db.php";
	if(isset($_SESSION['userid'])&&($_SESSION['level'] == 5)) {

	$member_id = $_GET['id'];
	$sql = mq("delete from member where id='$member_id';");
	echo "<script>alert('삭제되었습니다.');</script>";
	}else{
  echo "<script>alert('로그인이 필요합니다.'); location.href='../../index.php'; </script>";
	}
?>
<meta http-equiv="refresh" content="0 url=admin_memberlist.php" />
