<?php
	include "../../db.php";
	if(isset($_SESSION['userid'])){
?>
<!doctype html>
<html>
<head>
 <meta charset="UTF-8">
 <title>게시판</title>
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="../../css/board.css" />
<!-- 합쳐지고 최소화된 최신 CSS -->
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<!-- 부가적인 테마 -->
<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
<script src="../../js/bootstrap.min.js"></script>
<!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
<!-- 반응형 -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
/* 반응형 */
@media ( max-width: 767px ) {
	#board_area {
		width: auto;
	}
}
</style>
<style>
th{
  text-align: center;
}
</style>
<style>
td{
  text-align: center;
}
</style>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="../../../index_en.php">ProduceSM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../../page/evaluation_en.php">Evaluation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../page/trade_en.php">Trade</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../page/list_en.php">Bulletin board</a>
      </li>
			<?php if($_SESSION['level']==5) { ?>
			 <li class="nav-item">
				 <a class="nav-link" href="../../page/admin/adminlist.php">Admin</a>
			 </li>
		 <?php }?>
      <li class="nav-item active">
        <a class="nav-link" href="../../page/mypage_en.php">Mypage<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../member/logout_en.php">LogOut</a>
      </li>
    </ul>
  </div>
</nav>
<body>
	<div id="board_area">
		<br><br><h2>Mypage</h2><br>
			<table>
				<thead>
					<tr>
					 <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="user_information_en.php">User information</td>
 					 <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="my_evaluation_en.php">My evaluation</td>
 					 <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="my_trade_en.php">My trade</td>
 					 <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="my_list_en.php">My post</td>
 					 <td><a style="color:rgb(180, 180, 180);padding-right:20px;" href="my_reply_en.php">My trade comments</td>
					</tr>
				</thead>
			</table>
		<hr />
		<table class="table table-hover">
			<thead>
					<tr>
							<th width="50">Number</th>
								<th width="80">Subject</th>
								<th width="400">Title</th>
								<th width="100">Date</th>
								<th width="60">Hits</th>
						</tr>
				</thead>

        <?php

        //page번호 구하기
         if(isset($_GET['page'])){
            $page = $_GET['page'];
         }else{
            $page = 1;
         }

            $bo_mq = mq("select * from trade_board where name='".$_SESSION['userid']."'");
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

            $sql = mq("select * from trade_board where name='".$_SESSION['userid']."' order by idx desc limit $start_num, $list");
            while($trade_board = $sql->fetch_array()){
        $title=$trade_board["title"];
                if(strlen($title)>30){
                    $title=str_replace($trade_board["title"],mb_substr($trade_board["title"],0,30,"utf-8")."...",$trade_board["title"]);
          }

            $sql2 = mq("select * from trade_reply where con_num='".$trade_board['idx']."'");
            $rep_count = mysqli_num_rows($sql2);
        ?>
				<tbody>
					<tr>
									<td width="50"><?php echo $trade_board['idx']; ?></td>
									<td width="80"><?php echo $trade_board['trade_header']; ?></td>
									<td width="400">
										 <a href='../trade_board/trade_read_en.php?idx=<?php echo $trade_board["idx"]; ?>'>
											 <?php   echo $title; ?><span class="re_ct">[<?php echo $rep_count; ?>]</span></a>
									</td>
									<td width="100"><?php echo $trade_board['date']?></td>
									<td width="60"><?php echo $trade_board['hit']; ?></td>
							</tr>
				</tbody>
      <?php } ?>
    </table>
    <div id="page_num" style="margin-bottom:50px;">
        <ul>
          <?php
          /* 처음 */

              if($page <= 1){ //만약 page가 1보다 크거나 같다면
                  echo "<li class='fo_re'>First</li>"; //'처음'이라는 fo_re 클래스적용(CSS)
              }else{
                  echo "<li><a href=?page=1".$subString.">First</a></li>"; //아니라면 처음글자에 1번페이지로 갈 수있게 링크
              }

							/* 이전 */

									if($page <= 1){ //만약 page가 1보다 크거나 같다면
								 //아무것도 표시하지 않는다.
									}else{
										$pre = $page - 1;
											echo "<li><a href=?page=$pre".$subString.">Pre</a></li>"; //이전글자에 ?page=$page-1로서 현재 페이지에서 -1한다.
									}

          /* 페이징 번호 */
              for($i=$block_start; $i<=$block_end; $i++){
              //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if($page == $i){ //만약 $page가 $i와 같다면
                      echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 fo_re클래스를 적용(CSS)
                  }else{
                      echo "<li><a href='?page=$i".$subString."'>[$i]</a></li>"; //아니라면 $i를 표시하고 링크에도 $i를 적용한다.
                  }
              }

          /* 다음 */
              if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면
              // 빈 값
              }else{
                  $next = $page + 1; //next변수에 page + 1을 해준다.
                  echo "<li><a href=?page=$next".$subString.">Next</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
              }

          /* 마지막 */
              if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
                  echo "<li class='fo_re'>Last</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
              }else{
                  echo "<li><a href=?page=$total_page".$subString.">Last</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
              }
          ?>
        </ul>
		</div>
	</div>
	<!-- footer -->
	<div style="position:fixed; left:0px; bottom:0px; height:30px; width:100%; background:rgb(120, 194, 173);(120, 194, 173); color: white;">
		<p style="text-align:center; top:10px;">Copyright ⓒ ProduceSM. All rights reserved.</p>
	</div>
</body>
</html>
<?php
    }else{
        echo "<script>alert('Login is required'); location.href='../../index_en.php'; </script>";
    }
 ?>
