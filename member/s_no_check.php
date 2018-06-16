<?php
include "../db.php";
	if($_POST['student_idx'] != NULL){
	$s_no_check = mq("select * from member where student_idx='{$_POST['student_idx']}'");
	$s_no_check = $s_no_check->fetch_array();

	if($s_no_check >= 1){
		echo "중복된 학번입니다.";
	} else {
		echo "사용가능합니다.";
	}
} ?>
