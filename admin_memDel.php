<?php
	include "../../db.php";
  if($_SESSION['level'] == 5) {
  $id = $_GET['idx'];
	$sql = mq("delete from member where idx=$id");
	echo "<script>alert('탈퇴되었습니다.');</script>";
  session_destroy();
  echo "<script>document.location.href="admin_memberlist.php"</script>";
}
?>
