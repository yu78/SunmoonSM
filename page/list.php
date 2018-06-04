<?php error_reporting(E_ALL); ?> <!--검색 기능시 필요한 구문, 에러 체크한뒤 무엇이 문제인지 출력해줌 -->
<?php	include "../db.php"; ?>
<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>프로듀스SM</title>
  <meta name="viewport" content="wideth=device-width, initial-scale=1"> <!-- 반응형 -->
  <link rel="stylesheet" href="../css/board.css" />
	<!-- 합쳐지고 최소화된 최신 CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- 부가적인 테마 -->
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
	<script src="../js/bootstrap.min.js"></script>
	<!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
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
	<!-- 자바 스크립트 -->
	<script language = "javascript">
	// 팝업창 호출
	function popupLogin() {
		//팝업창 가운데 호출 함수가 제대로 안됨 일단은 눈대중으로 가운데 맞춰놨음
		// var windowWidth = 700; //가로
		// var windowHeight = 600; //세로
		// var left = Math.ceil((window.screen.width - windowWidth)/2);
		// var top = Math.ceil((window.screen.height - windowHeight)/2);
		// window.open("signUp.html", "a", "width="+windowWidth+, "height="+windowHeight+, "left="+left+, "top="+top+);}
		window.open("../member/login.php", "a", "width=500, height=600, left=550, top=100");
		}
		function popupRegister() {
			window.open("../member/register.php", "a", "width=550, height=600, left=550, top=30");
		}
		</script>

 </head>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand"href="../index.php">프로듀스SM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../page/evaluation.php">강의평가</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../page/trade.php">강의교환</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../page/list.php">자유게시판 <span class="sr-only">(current)</span></a>
      </li>
			<?php if(isset($_SESSION['userid'])){	?>
				<li class="nav-item">
					<a class="nav-link" href="../page/mypage.php">마이페이지</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../member/logout.php">로그아웃</a>
				</li>
      <?php } else { ?>
			<li class="nav-item">
				<a class="nav-link" onclick="popupLogin();">로그인</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" onclick="popupRegister();">회원가입</a>
			</li>
			<?php } ?>
    </ul>

  </div>
</nav>

 <body>
    <div id="board_area">
		<!--h3><a href="../index.php"><img src="../img/프로듀스SM로고.png"></a></h3-->

	 	 <br><br><h2>자유게시판</h2>
		 <br>
		 <!--검색관련 부분-->
		 <form class="form-inline my-2 my-lg-0">
		 	<div class="form-group">
		 		<form action="list.php" method="get">
		 		<!--제목 내용 선택 박스-->
		 	<select class="form-control" name = "searchColumn" id="exampleSelect1">
		 		<option<?php echo $searchColumn=='title'?'selected="selected"':null?> value="title">제목</option>
		 		<option<?php echo $searchColumn=='content'?'selected="selected"':null?> value="content">내용</option>
		 	</select>
		 <!--검색 창 부분-->
		 	<input class="form-control mr-sm-2" type="text" name="searchText" value="<?php echo isset($searchText)?$searchText:null?>" placeholder="Search">
		 	<button class="btn btn-secondary my-2 my-sm-0" type="submit">검색</button>
		 </form>
		 </div>
		 </form>
        <?php if(isset($_SESSION['userid'])){ ?>
          <div style="display:block">
            <h6 align="right"><?php echo $_SESSION['userid']; ?>님 환영합니다.</h6>
          </div>
        <?php } else { ?>
          <br>
          <div style="display:none">
            <h6 align="right"><?php echo $_SESSION['userid']; ?>님 환영합니다.</h6>
          </div>
        <?php } ?>
						<table class="table table-hover">
            	<thead>
                	<tr>
                    	<th width="70">번호</th>
                        <th width="620">제목</th>
                        <th width="150">작성일</th>
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

								 /* 검색 시작 */
								 $subString = ''; // 초기화 후에

								 if(isset($_GET['searchColumn'])) {
 								 	$searchColumn = $_GET['searchColumn'];
								 	$subString .= '&amp;searchColumn=' . $searchColumn;
							 	 }

							 	 if(isset($_GET['searchText'])) {
 							 		$searchText = $_GET['searchText'];
							 		$subString .= '&amp;searchText=' . $searchText;
						 		 }

						 	 	 if(isset($searchColumn) && isset($searchText)) {
							 	 	$searchSql = ' where ' . $searchColumn . ' like "%' . $searchText . '%"';
						 		 } else {
							 	 	$searchSql = '';
						 		 }
						 	 	 /* 검색 끝 */

                    $bo_mq = mq("select * from free_board");
                    $row_num = mysqli_num_rows($bo_mq); //게시판 총 레코드 수, 전체 게시글의 수

                    $list = 5; //한 페이지에 보여줄 개수
                    $block_ct = 5; //블록당 보여줄 페이지 개수

                    $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기, 전체 페이지의 수
                    $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호

                    $block_end = $block_start + $block_ct - 1; //블록 마지막 번호
                    $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기

										if($block_end > $total_page) $block_end = $total_page;
                    //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수

                    $total_block = ceil($total_page/$block_ct); //블럭 총 개수
                    $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

										$sql = mq("select * from free_board $searchSql order by idx desc limit $start_num, $list"); //검색 기능은 $searchSql 포함하기
                    while($free_board = $sql->fetch_array()){
            		$title=$free_board["title"];
                        if(strlen($title)>30){
                            $title=str_replace($free_board["title"],mb_substr($free_board["title"],0,30,"utf-8")."...",$free_board["title"]);
            			}

                    $sql2 = mq("select * from free_reply where con_num='".$free_board['idx']."'");
                    $rep_count = mysqli_num_rows($sql2);
            		?>
            	<tbody>
            		<tr>
                        <td width="70"><?php echo $free_board['idx']; ?></td>
                        <td width="620">
                          <a href='free_board/free_read.php?idx=<?php echo $free_board["idx"]; ?>'>
														<?php   echo $title; ?><span class="re_ct">[<?php echo $rep_count; ?>]</span></a>
	                      </td>
                        <td width="150"><?php echo $free_board['date']?></td>
                        <td width="100"><?php echo $free_board['hit']; ?></td>
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
                            echo "<li><a href=?page=1".$subString.">처음</a></li>"; //아니라면 처음글자에 1번페이지로 갈 수있게 링크
                        }

                    /* 이전 */

                        if($page <= 1){ //만약 page가 1보다 크거나 같다면
                       //아무것도 표시하지 않는다.
                        }else{
                            echo "<li><a href=?page=$page-1".$subString.">이전</a></li>"; //이전글자에 ?page=$page-1로서 현재 페이지에서 -1한다.
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
                            echo "<li><a href=?page=$next".$subString.">다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                        }

                    /* 마지막 */
                        if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
                            echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
                        }else{
                            echo "<li><a href=?page=$total_page".$subString.">마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
                        }
                    ?>
                </ul>
            </div>
            <div id="write_btn">
              <a class="btn btn-secondary my-2 my-sm-0" data-toggle="modal" href="free_board/free_write.php">글쓰기</a>
            </div>
        </div>
				<!-- footer -->
				<div class="container" style="padding-top:100px;">
					<p class="text-center">Copyright ⓒ 프로듀스SM. All rights reserved.</p>
				</div>
    </body>
</html>
