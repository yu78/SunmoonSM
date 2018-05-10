<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>프로듀스SM</title>
    <meta name="viewport" content="wideth=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link rel="stylesheet" href="css/top_menu.css" />
    <!-- 팝업창 호출 -->
    <script language = "javascript">
      function showPopup() {
        //팝업창 가운데 호출 함수가 제대로 안됨 일단은 눈대중으로 가운데 맞춰놨음
        // var windowWidth = 700; //가로
        // var windowHeight = 600; //세로
        // var left = Math.ceil((window.screen.width - windowWidth)/2);
        // var top = Math.ceil((window.screen.height - windowHeight)/2);
        // window.open("signUp.html", "a", "width="+windowWidth+, "height="+windowHeight+, "left="+left+, "top="+top+);}
        window.open("../member/member.php", "a", "width=700, height=600, left=430, top=50");}
    </script>
  </head>
  <body>
    <div id="login_box">
      <h1>로그인</h1>
        <h4 id="main_t">게시판을 이용하려면 로그인이 필요합니다.</h4>
          <form method="post" action="login_ok.php">
      			<table align="center" border="0" cellspacing="0" width="300" id="log_ta">
              <tr>
                <td width="130" colspan="1"><input type="text" name="userid" class="inph"></td>
                <td rowspan="2" align="center" width="100" > <button type="submit" id="btn" >로그인</button></td>
              </tr>
              <tr>
                <td width="130" colspan="1"> <input type="password" name="userpw" class="inph"></td>
              </tr>
              <tr>
                <input type = "button" align="center" href="../memeber/member.php" value = "회원가입" onclick="showPopup();" />
                <!-- <input type = "button" align="center" href="../memeber/member.php" value = "회원가입" onclick="showPopup();" /> -->
                <!-- <td colspan="3" align="center" class="mem"><a href="member/member.php" onclick="showPopup();" >회원가입 하시겠습니까?</a></td> -->
              </tr>
            </table>
          </form>
        </div>
      </body>
</html>
