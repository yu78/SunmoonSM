<?php
include_once('mailer.lib.php');
include "db.php";

// mailer("보내는 사람 이름", "보내는 사람 메일주소", "받는 사람 메일주소", "제목", "내용", "type");
mailer("프로듀스sm", "parkyj927@naver.com", "pyj927@sunmoon.ac.kr", "인증 메일 테스트", "내용", 1);
?>
