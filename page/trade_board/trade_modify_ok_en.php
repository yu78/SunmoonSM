<?php
	include "../../db.php";
if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){

	$bno = $_POST['idx'];
	$sql = mq("select * from trade_board where idx='$bno';");
	$trade_board = $sql->fetch_array();

	$sql2 = mq("update trade_board set name='".$_SESSION['userid']."',title='".$_POST['title']."',trade_header='".$_POST['trade_header']."',content='".$_POST['content']."' where idx = '".$bno."'");
echo "<script>alert('It has been modified.');</script>";
?>
<meta http-equiv="refresh" content="0 url=../../trade_board/trade_read_en.php?idx=<?php echo $trade_board['idx']; ?>">
<?php
		}else if((isset($_SESSION['userid'])&&($_SESSION['state']=='0'))){
				echo "<script>alert('You can use it after authentication on My Page.'); location.href='../../page/trade_en.php'; </script>";
    }else{
			echo "<script>alert('Login is required'); location.href='../../page/trade_en.php'; </script>";
    }
?>
