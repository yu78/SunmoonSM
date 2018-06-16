<?php
	include "../../db.php";
if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){

	$bno = $_POST['idx'];
	$sql = mq("select * from free_board where idx='$bno';");
	$free_board = $sql->fetch_array();

	$tmpfile =  $_FILES['b_file']['tmp_name'];
	$o_name = $_FILES['b_file']['name'];
	$filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
	$folder = "../../upload/".$filename;
	move_uploaded_file($tmpfile,$folder);


$sql2 = mq("update free_board set name='".$_SESSION['userid']."',title='".$_POST['title']."',content='".$_POST['content']."',file='".$o_name."' where idx = '".$bno."'");
echo "<script>alert('修正されました。');</script>";
?>
<meta http-equiv="refresh" content="0 url=../../free_board/free_read_jp.php?idx=<?php echo $free_board['idx']; ?>">
<?php
		}else if((isset($_SESSION['userid'])&&($_SESSION['state']=='0'))){
				echo "<script>alert('マイページで認証後に使用することができます。'); location.href='../../page/list_jp.php'; </script>";
    }else{
			echo "<script>alert('ログインが必要です。'); location.href='../../page/list_jp.php'; </script>";
    }
?>
