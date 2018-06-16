<?php
	include "../../db.php";
if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){

	$bno = $_POST['idx'];
	$sql = mq("select * from trade_board where idx='$bno';");
	$trade_board = $sql->fetch_array();

	$sql2 = mq("update trade_board set name='".$_SESSION['userid']."',title='".$_POST['title']."',trade_header='".$_POST['trade_header']."',content='".$_POST['content']."' where idx = '".$bno."'");
echo "<script>alert('수정되었습니다.');</script>";
?>
<meta http-equiv="refresh" content="0 url=../../trade_board/trade_read.php?idx=<?php echo $trade_board['idx']; ?>">
<?php
		}else if((isset($_SESSION['userid'])&&($_SESSION['state']=='0'))){
				echo "<script>alert('마이페이지에서 인증 후 사용하실 수 있습니다.'); location.href='../../page/trade.php'; </script>";
    }else{
			echo "<script>alert('로그인이 필요합니다.'); location.href='../../page/trade.php'; </script>";
    }
?>
