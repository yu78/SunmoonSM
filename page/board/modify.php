<!--- 게시글 수정 -->
<?php
    header('Content-Type: text/html; charset=utf-8');
	include "../../db.php";
    if(isset($_SESSION['userid'])){

	$bno = $_GET['idx'];
	$sql = mq("select * from board where idx='$bno';");
	$board = $sql->fetch_array();
 ?>
 <!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" href="../../css/board.css" />
 </head>
 <body>
    <div id="board_write">
        <h1><a href="/index.php">자유게시판</a></h1>
        <h4>글을 수정합니다.</h4>
            <div id="write_area">
                <div id="icon">
                    <!--- 준비중 -->
                </div>
                <form action="modify_ok.php/<?php echo $board['idx']; ?>" method="post">
                    <input type="hidden" name="idx" value="<?=$bno?>">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
                    </div>
                    <div id="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" cols="110" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                    </div>
                    <div id="in_pw">
                        <input type="password" name="pw" id="upw" placeholder="비밀번호" required/>  
                    </div>
                    <div id="in_lock">
                         <input type="checkbox" value="1" name="lockpost" />해당글을 비공개로 설정합니다.
                    </div>
                    <div class="bt_se">
                        <button>글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
}else{
echo "<script>alert('잘못된 접근입니다.'); location.href='../../index.php'; </script>";
    }
?> 