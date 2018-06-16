<?php
	include "../db.php";
	include "../password.php";

	$userid = $_POST['userid'];
	$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
	$email = $_POST['email'].$_POST['emadress'];
	$student_idx = $_POST['student_idx'];
	$college_name = $_POST['college_name'];
	$major_name = $_POST['major_name'];
	$m_date = $_POST['m_date'];
	$m_updated_date = $_POST['m_updated_date'];

	$id_check = mq("select * from member where id='$userid'");
	$id_check = $id_check->fetch_array();
	$s_no_check = mq("select * from member where student_idx='$student_idx'");
	$s_no_check = $s_no_check->fetch_array();

	if($id_check >= 1){
		echo "<script>alert('Duplicate ID.'); history.back();</script>";
	}
	else if(!(strlen($student_idx)==10)) {
		echo "<script>alert('student ID number is 10'); history.back();</script>";
	}
	else if($s_no_check >= 1) {
		echo "<script>alert('Duplicate student ID number.'); history.back();</script>";
	}
	else{
		$sql = mq("insert into member (id,pw,email,student_idx,college_name,major_name,hashkey)
		values('".$userid."','".$userpw."','".$email."','".$student_idx."','".$college_name."','".$major_name."','".sha1(mt_rand(10000,99999).time().$email)."')");
?>
<meta charset="utf-8" />
<script type="text/javascript">alert('Completed!'); self.close(); </script>
<meta http-equiv="refresh" content="0 url=/">
<?php } ?>
