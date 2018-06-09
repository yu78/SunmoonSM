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
echo "<script>alert('修正されました。');</script>";
?>
<script type="text/javascript">location.replace("trade_read_jp.php?idx=<?php echo $bno; ?>");</script>
<?php
    }else{
      echo "<script>alert('ログインが必要です。'); location.href='../index_jp.php'; </script>";
    }
?>
