<?php
	include "../db.php";
	include "../password.php";

	$userid = $_POST['userid'];
	$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
	$username = $_POST['name'];
	$email = $_POST['email'].$_POST['emadress'];
	$student_idx = $_POST['student_idx'];
	$college_name = $_POST['college_name'];
	$major_name = $_POST['major_name'];

$id_check = mq("select * from member where id='$userid'");
	$id_check = $id_check->fetch_array();
	if($id_check >= 1){
		echo "<script>alert('아이디가 중복됩니다.'); history.back();</script>";
	}
	else if(!(strlen($student_idx)==10)) {
		echo "<script>alert('학번은 10자리 입니다.'); history.back();</script>";
	}
	else{
$sql = mq("insert into member (id,pw,name,email,student_idx,college_name,major_name)
values('".$userid."','".$userpw."','".$username."','".$email."','".$student_idx."','".$college_name."','".$major_name."')");
?>
<meta charset="utf-8" />
<script type="text/javascript">alert('회원가입이 완료되었습니다.'); self.close(); </script>
<meta http-equiv="refresh" content="0 url=/">
<?php } ?>