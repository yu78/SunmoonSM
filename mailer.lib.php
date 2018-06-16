<?php
include_once('./PHPMailer/PHPMailerAutoload.php');
// 네이버 메일 전송
// 메일 -> 환경설정 -> POP3/IMAP 설정 -> POP3/SMTP & IMAP/SMTP 중에 IMAP/SMTP 사용
// 메일 보내기 (파일 여러개 첨부 가능)
// mailer("보내는 사람 이름", "보내는 사람 메일주소", "받는 사람 메일주소", "제목", "내용", "type");
// type : text=0, html=1, text+html=2
// ex) mailer("kOO", "zzxp@naver.com", "zzxp@naver.com", "제목 테스트", "내용 테스트", 1);
function mailer($fname, $fmail, $to, $subject, $content, $type=0, $cc="", $bcc="")
{
    if ($type != 1)
        $content = nl2br($content);
    $mail = new PHPMailer(); // defaults to using php "mail()"
	$mail->IsSMTP();
//	$mail->SMTPDebug = 2;
	$mail->SMTPSecure = "ssl";
	$mail->SMTPAuth = true;
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
  $mail->Username = "producesm2018";
  $mail->Password = "producesm!2018";
    $mail->CharSet = 'UTF-8';
    $mail->From = $fmail;
    $mail->FromName = $fname;
    $mail->Subject = $subject;
    $mail->AltBody = ""; // optional, comment out and test
    $mail->msgHTML($content);
    $mail->addAddress($to);
    if ($cc)
        $mail->addCC($cc);
    if ($bcc)
        $mail->addBCC($bcc);
        if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      echo "<script>alert('인증메일이 발송되었습니다!'); location.href='page/mypage_board/user_information.php'; </script>";// "Message sent!"; //'<script>alert("Message sent!");</script>';
    }
    // return $mail->send();
}
?>
