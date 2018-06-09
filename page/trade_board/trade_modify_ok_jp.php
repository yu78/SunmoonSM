<?php
	include "../../db.php";
if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){

	$bno = $_POST['idx'];
	$sql = mq("select * from trade_board where idx='$bno';");
	$trade_board = $sql->fetch_array();

	$sql2 = mq("update trade_board set name='".$_SESSION['userid']."',title='".$_POST['title']."',trade_header='".$_POST['trade_header']."',content='".$_POST['content']."' where idx = '".$bno."'");
echo "<script>alert('修正されました。');</script>";
?>
<meta http-equiv="refresh" content="0 url=../../trade_board/trade_read_jp.php?idx=<?php echo $trade_board['idx']; ?>">
<?php
    }else{
      echo "<script>alert('ログインが必要です。'); location.href='../index_jp.php'; </script>";
    }
?>
