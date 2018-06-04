<?php
include "../../db.php";

if(isset($_SESSION['userid'])){

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
    }else{
      echo "<script>alert('잘못된 접근입니다.'); location.href='../index.php'; </script>";
    }
?>
