<?php
	include "../db.php";
	if(isset($_SESSION['userid'])){
?>
<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>자유게시판</title>
  <link rel="stylesheet" href="../css/board.css" />
	<link rel="stylesheet" href="../css/top_menu.css">
 </head>
 <body>
    <div id="board_area">
		<h3><a href="../index.php"><img src="../img/프로듀스SM로고.png"></a></h3>
	  <nav id="topMenu">
	 		<ul class="center">
	 		<li><a class="menuLink" href="../page/evaluation.php">강의평가</a></li>
	 		<li><a class="menuLink" href="../page/trade.php">강의교환</a></li>
	 		<li><a class="menuLink" href="../page/list.php">자유게시판</a></li>
	 		</ul>
	 	 </nav>
	 	 <br><br><h2>자유게시판</h2>
        <h4 align="right"><?php echo $_SESSION['userid']; ?>님 환영합니다.<a href="../member/logout.php">로그아웃</a></h4>
            <table class="list-table">
            	<thead>
                	<tr>
                    	<th width="70">번호</th>
                        <th width="500">제목</th>
                        <th width="120">글쓴이</th>
                        <th width="100">작성일</th>
                        <th width="100">조회수</th>
                    </tr>
                </thead>
								<?php

                //page번호 구하기
                 if(isset($_GET['page'])){
                    $page = $_GET['page'];
                 }else{
                    $page = 1;
                 }

                    $bo_mq = mq("select * from board");
                    $row_num = mysqli_num_rows($bo_mq); //게시판 총 레코드 수

                    $list = 5; //한 페이지에 보여줄 개수
                    $block_ct = 5; //블록당 보여줄 페이지 개수

                    $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
                    $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호

                    $block_end = $block_start + $block_ct - 1; //블록 마지막 번호
                    $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기

										if($block_end > $total_page) $block_end = $total_page;
                    //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수

                    $total_block = ceil($total_page/$block_ct); //블럭 총 개수
                    $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

										$sql = mq("select * from board order by idx desc limit $start_num, $list");
                    while($board = $sql->fetch_array()){
            		$title=$board["title"];
                        if(strlen($title)>30){
                            $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
            			}

                    $sql2 = mq("select * from reply where con_num='".$board['idx']."'");
                    $rep_count = mysqli_num_rows($sql2);
            		?>
            	<tbody>
            		<tr>
                        <td width="70"><?php echo $board['idx']; ?></td>
                        <td width="500">
													<?php
	                            if($board['lock_post']=="1") {
																?><a href='board/ck_read.php?idx=<?php echo $board["idx"];?>'><?php echo $title;
	                            }else{  ?>
	                              <a href='board/read.php?idx=<?php echo $board["idx"]; ?>'><?php   echo $title;
															}?><span class="re_ct">[<?php echo $rep_count; ?>]</span></a>
	                           </td>
                        <td width="120"><?php echo $board['name']?></td>
                        <td width="100"><?php echo $board['date']?></td>
                        <td width="100"><?php echo $board['hit']; ?></td>
                    </tr>
            	</tbody>
            	<?php } ?>
            </table>
						<div id="page_num">
                <ul>
                    <?php
                    /* 처음 */

                        if($page <= 1){ //만약 page가 1보다 크거나 같다면
                            echo "<li class='fo_re'>처음</li>"; //'처음'이라는 fo_re 클래스적용(CSS)
                        }else{
                            echo "<li><a href='?page=1'>처음</a></li>"; //아니라면 처음글자에 1번페이지로 갈 수있게 링크
                        }

                    /* 이전 */

                        if($page <= 1){ //만약 page가 1보다 크거나 같다면
                       //아무것도 표시하지 않는다.
                        }else{
                            echo "<li><a href='?page=$page-1'>이전</a></li>"; //이전글자에 ?page=$page-1로서 현재 페이지에서 -1한다.
                        }

                    /* 페이징 번호 */
                        for($i=$block_start; $i<=$block_end; $i++){
                        //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if($page == $i){ //만약 $page가 $i와 같다면
                                echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 fo_re클래스를 적용(CSS)
                            }else{
                                echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i를 표시하고 링크에도 $i를 적용한다.
                            }
                        }

                    /* 다음 */
                        if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면
                        // 빈 값
                        }else{
                            $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<li><a href='?page=$next'>다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                        }

                    /* 마지막 */
                        if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
                            echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
                        }else{
                            echo "<li><a href='?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
                        }
                    ?>
                </ul>
            </div>
            <div id="write_btn">
            	<a href="board/write.php"><button>글쓰기</button></a>
            </div>
        </div>
    </body>
</html>
    <?php
        }else{
            echo "<script>alert('잘못된 접근입니다.'); location.href='../index.php'; </script>";
        }
     ?>
