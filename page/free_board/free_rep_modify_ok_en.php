<?php
include "../../db.php";

if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){

$rno = $_POST['rno'];
$sql = mq("select * from free_reply where idx='".$rno."'");
$free_reply = $sql->fetch_array();

$bno = $_POST['b_no'];
$sql2 = mq("select * from free_board where idx='".$bno."'");
$free_board = $sql2->fetch_array();

$sql3 = mq("update free_reply set content='".$_POST['content']."' where idx = '".$rno."'");
echo "<script>alert('It has been modified.');</script>";
?>
<script type="text/javascript">location.replace("free_read_en.php?idx=<?php echo $bno; ?>");</script>
<?php
		}else if((isset($_SESSION['userid'])&&($_SESSION['state']=='0'))){
				echo "<script>alert('You can use it after authentication on My Page.'); location.href='../../page/list_en.php'; </script>";
    }else{
			echo "<script>alert('Login is required'); location.href='../../page/list_en.php'; </script>";
    }
?>
