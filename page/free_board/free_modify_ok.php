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
echo "<script>alert('수정되었습니다.');</script>";
?>
<meta http-equiv="refresh" content="0 url=../../free_board/free_read.php?idx=<?php echo $free_board['idx']; ?>">
<?php
		}else if((isset($_SESSION['userid'])&&($_SESSION['state']=='0'))){
				echo "<script>alert('마이페이지에서 인증 후 사용하실 수 있습니다.'); location.href='../../page/list.php'; </script>";
    }else{
			echo "<script>alert('로그인이 필요합니다.'); location.href='../../page/list.php'; </script>";
    }
?>
