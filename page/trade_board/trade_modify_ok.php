<?php
	include "../../db.php";
if(isset($_SESSION['userid'])){

	$bno = $_POST['idx'];
	$sql = mq("select * from trade_board where idx='$bno';");
	$trade_board = $sql->fetch_array();

	$sql2 = mq("update trade_board set name='".$_SESSION['userid']."',title='".$_POST['title']."',trade_header='".$_POST['trade_header']."',content='".$_POST['content']."' where idx = '".$bno."'");
echo "<script>alert('수정되었습니다.');</script>";
?>
<meta http-equiv="refresh" content="0 url=../../trade_board/trade_read.php?idx=<?php echo $trade_board['idx']; ?>">
<?php
    }else{
      echo "<script>alert('잘못된 접근입니다.'); location.href='../index.php'; </script>";
    }
?>
