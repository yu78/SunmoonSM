<?php
	include "../../db.php";
if(isset($_SESSION['userid'])){

	$bno = $_POST['idx'];
	$sql = mq("select * from evaluation where idx='$bno';");
	$evaluation = $sql->fetch_array();

$sql2 = mq("update evaluation set name='".$_SESSION['userid']."',lectureName='".$_POST['lectureName']."',professorName='".$_POST['professorName']."',lectureYear='".$_POST['lectureYear']."',semesterDivide='".$_POST['semesterDivide']."',lectureDivide='".$_POST['lectureDivide']."',title='".$_POST['title']."',content='".$_POST['content']."',totalScore='".$_POST['totalScore']."',creditScore='".$_POST['creditScore']."',comfortableScore='".$_POST['comfortableScore']."',lectureScore='".$_POST['lectureScore']."' where idx = '".$bno."'");
echo "<script>alert('수정되었습니다.');</script>";
?>
<meta http-equiv="refresh" content="0 url=../../evaluation.php?idx=<?php echo $evaluation['idx']; ?> ">
<?php
    }else{
      echo "<script>alert('잘못된 접근입니다.'); location.href='../index.php'; </script>";
    }
?>
