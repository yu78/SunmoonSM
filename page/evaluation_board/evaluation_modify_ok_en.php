<?php
	include "../../db.php";
if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){

	$bno = $_POST['idx'];
	$sql = mq("select * from evaluation where idx='$bno';");
	$evaluation = $sql->fetch_array();

$sql2 = mq("update evaluation set name='".$_SESSION['userid']."',lectureName='".$_POST['lectureName']."',professorName='".$_POST['professorName']."',lectureYear='".$_POST['lectureYear']."',semesterDivide='".$_POST['semesterDivide']."',lectureDivide='".$_POST['lectureDivide']."',title='".$_POST['title']."',content='".$_POST['content']."',totalScore='".$_POST['totalScore']."',creditScore='".$_POST['creditScore']."',comfortableScore='".$_POST['comfortableScore']."',lectureScore='".$_POST['lectureScore']."' where idx = '".$bno."'");
echo "<script>alert('It has been modified.');</script>";
?>
<meta http-equiv="refresh" content="0 url=../../evaluation_en.php?idx=<?php echo $evaluation['idx']; ?> ">
<?php
		}else if((isset($_SESSION['userid'])&&($_SESSION['state']=='0'))){
				echo "<script>alert('You can use it after authentication on My Page.'); location.href='../../page/evaluation_en.php'; </script>";
    }else{
			echo "<script>alert('Login is required'); location.href='../../page/evaluation_en.php'; </script>";
    }
?>
