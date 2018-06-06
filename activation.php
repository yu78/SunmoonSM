<?php

  if(isset($_SESSION['userid'])) exit("잘못된 접근입니다!");
  include_once('mailer.lib.php');
  include "db.php";

  $sql = mq("select * from member where id='".$_SESSION['userid']."'");
  $result = $sql->fetch_array();
  $from = "parkyj927@naver.com";
  $subject = "인증메일 입니다.";
  $verify = 'http://127.0.0.1/page/mypage_board/activation_ok.php?verify='.$result['hashkey'];
  // echo $verify;
  // // mailer("보내는 사람 이름", "보내는 사람 메일주소", "받는 사람 메일주소", "제목", "내용", "type");
  mailer("프로듀스sm", $from, $result['email'], $subject, $verify, 1);

 // mailer("프로듀스sm", "parkyj927@naver.com", $_SESSION['userid']."@sunmoon.ac.kr", $subject, $verify, 1);

  echo '<script>alert("인증메일이 발송되었습니다.");</script>';
?>
