<?php

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

  include_once("db.php");

if(isset($_GET['verify'])){
  $hashkey = $_GET['verify'];
  $sql = mq("SELECT * from member where hashkey='$hashkey'");
  $result = $sql->fetch_array();

  if($result['state'] === '1') {
      $output = 'Your Email has already been verified.';
  } else {
      $cnt = mysqli_num_rows($sql);
      if($cnt === 1) {
          $sql = mq("UPDATE member SET state='1' WHERE hashkey='$hashkey'");
          if($result) {
              $output = '인증 성공!';
          } else {
              $output = '쿼리 에러';
          }
      } else {
          $output = 'Unable to verify your email address.'; // email 주소 체크
      }
  }
}
  // mysql_close();
  echo '<script>alert("'.$output.'");</script>'; //'alert("'.$output.'")';

//   function verifyEmailAddress($email, $hkey) {
//     $query = mq("SELECT * FROM member WHERE email='$email' AND hashkey='$hkey'");
//     $result = mysql_fetch_array($query);
//     if($result['state'] === '1') {
//         $output = 'Your Email has already been verified.';
//     } else {
//         $cnt = mysql_num_rows($query);
//         if($cnt === 1) {
//             $query = mq("UPDATE member SET state='1' WHERE email='$email' AND hashkey='$hkey'");
//             if($query) {
//                 $output = '인증 성공!';
//             } else {
//                 $output = '쿼리 에러';
//             }
//         } else {
//             $output = 'Unable to verify your email address.'; // email 주소 체크
//         }
//     }
//     mysql_close();
//     return $output;
// }
?>
