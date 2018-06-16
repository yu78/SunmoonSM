<?php
include "../../db.php";

if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){

$rno = $_POST['rno'];
$sql = mq("select * from trade_reply where idx='".$rno."'");
$trade_reply = $sql->fetch_array();

$bno = $_POST['b_no'];
$sql2 = mq("select * from trade_board where idx='".$bno."'");
$trade_board = $sql2->fetch_array();

$sql3 = mq("update trade_reply set content='".$_POST['content']."' where idx = '".$rno."'");
echo "<script>alert('수정되었습니다.');</script>";
?>
<script type="text/javascript">location.replace("trade_read.php?idx=<?php echo $bno; ?>");</script>
<?php
		}else if((isset($_SESSION['userid'])&&($_SESSION['state']=='0'))){
				echo "<script>alert('마이페이지에서 인증 후 사용하실 수 있습니다.'); location.href='../../page/trade.php'; </script>";
    }else{
			echo "<script>alert('로그인이 필요합니다.'); location.href='../../page/trade.php'; </script>";
    }
?>
