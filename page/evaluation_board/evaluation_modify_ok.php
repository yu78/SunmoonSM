<?php
	include "../../db.php";
if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){

	$bno = $_POST['idx'];
	$sql = mq("select * from evaluation where idx='$bno';");
	$evaluation = $sql->fetch_array();

$sql2 = mq("update evaluation set name='".$_SESSION['userid']."',lectureName='".$_POST['lectureName']."',professorName='".$_POST['professorName']."',lectureYear='".$_POST['lectureYear']."',semesterDivide='".$_POST['semesterDivide']."',lectureDivide='".$_POST['lectureDivide']."',title='".$_POST['title']."',content='".$_POST['content']."',totalScore='".$_POST['totalScore']."',creditScore='".$_POST['creditScore']."',comfortableScore='".$_POST['comfortableScore']."',lectureScore='".$_POST['lectureScore']."' where idx = '".$bno."'");
echo "<script>alert('수정되었습니다.');</script>";
?>
<meta http-equiv="refresh" content="0 url=../../evaluation.php?idx=<?php echo $evaluation['idx']; ?> ">
<?php
		}else if((isset($_SESSION['userid'])&&($_SESSION['state']=='0'))){
				echo "<script>alert('마이페이지에서 인증 후 사용하실 수 있습니다.'); location.href='../../page/evaluation.php'; </script>";
    }else{
			echo "<script>alert('로그인이 필요합니다.'); location.href='../../page/evaluation.php'; </script>";
    }
?>
