<?php
	include "../../db.php";
	if(isset($_SESSION['userid'])){

	$sql = mq("delete from member where id='".$_SESSION['userid']."'");
	echo "<script>alert('Membership has been withdrawn.');</script>";
  session_destroy();
	}else{
  echo "<script>alert('Login is required'); location.href='../../index_en.php'; </script>";
	}
?>
<meta http-equiv="refresh" content="0 url=../../index_en.php" />
