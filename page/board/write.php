<?php
	include "../../db.php";
    if(isset($_SESSION['userid'])){
?>
<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" href="../../css/board.css" />
	<link rel="stylesheet" href="../../css/top_menu.css">
 </head>
 <body>
	 <div id="board_write">
		 <h3><a href="../../../index.php"><img src="../../../img/프로듀스SM로고.png"></a></h3>
			<nav id="topMenu">
			 <ul class="center">
			 <li><a class="menuLink" href="../../page/evaluation.php">강의평가</a></li>
			 <li><a class="menuLink" href="../../page/trade.php">강의교환</a></li>
			 <li><a class="menuLink" href="../../page/list.php">자유게시판</a></li>
			 </ul>
			</nav>
            <div id="write_area">
                <div id="icon">
                    <!--- 준비중 -->
                </div>
                <form action="write_ok.php" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div id="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    </div>
                    <div class="bt_se">
                        <button>글 작성</button><br><br>
                    </div>
                </form>
            </div>
        </body>
    </html>
<?php
}else{
    header('Content-Type: text/html; charset=utf-8');
echo "<script>alert('잘못된 접근입니다.'); location.href='../../index.php'; </script>";
    }
?>
