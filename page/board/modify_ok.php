<?php
	include "../../db.php";
if(isset($_SESSION['userid'])){

	$bno = $_POST['idx'];
	$sql = mq("select * from board where idx='$bno';");
	$board = $sql->fetch_array();
	$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
	if(isset($_POST['lockpost'])){
	$lo_post = '1';
}else{
	$lo_post = '0';
}

$sql2 = mq("update board set name='".$_SESSION['userid']."',pw='".$userpw."',title='".$_POST['title']."',content='".$_POST['content']."',lock_post='".$lo_post."' where idx = '".$bno."'");
echo "<script>alert('수정되었습니다.');</script>";
?>
<meta http-equiv="refresh" content="0 url=../../board/read.php?idx=<?php echo $board['idx']; ?>">
<?php 
    }else{
      echo "<script>alert('잘못된 접근입니다.'); location.href='../index.php'; </script>";
    } 
?>