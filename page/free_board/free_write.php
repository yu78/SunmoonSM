<?php
	include "../../db.php";
    if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){
?>
<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>프로듀스SM 자유게시판</title>
  <link rel="stylesheet" href="../../css/board.css" />
	<!-- 합쳐지고 최소화된 최신 CSS -->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<!-- 부가적인 테마 -->
	<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
	<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
	<script src="../../js/bootstrap.min.js"></script>
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
 </head>
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
   <a class="navbar-brand" href="../../../index.php">프로듀스SM</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
     <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse" id="navbarColor01">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
         <a class="nav-link" href="../../page/evaluation.php">강의평가</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="../../page/trade.php">강의교환</a>
       </li>
       <li class="nav-item active">
         <a class="nav-link" href="../../page/list.php">자유게시판 <span class="sr-only">(current)</span></a>
       </li>
			 <?php if($_SESSION['level']==5) { ?>
				<li class="nav-item">
					<a class="nav-link" href="../../page/admin/adminlist.php">관리자</a>
				</li>
			<?php }?>
			 <li class="nav-item">
				 <a class="nav-link" href="../../page/mypage.php">마이페이지</a>
			 </li>
			 <li class="nav-item">
				 <a class="nav-link" href="../../member/logout.php">로그아웃</a>
			 </li>
     </ul>
   </div>
 </nav>
 <body>
	 <div id="board_write" style="margin-bottom:50px;">
            <div id="write_area">
							<h3>자유게시판</h3>
                <form action="free_write_ok.php" method="post" enctype="multipart/form-data">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" class="form-control" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div id="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" class="form-control" placeholder="내용" required></textarea>
                    </div>
										<div id="in_file" style="margin-top:10px; margin-bottom:10px;">
           							<input type="file" value="1" name="b_file" />
        						</div>
									<div style="margin-top:10px;">
										<button class="btn btn-info">글 작성</button>
										<button type="button" class="btn btn-secondary" onClick="history.back();">취소</button>
									</div>
								</form>
            </div>
					</div>
						<!-- footer -->
						<div style="position:fixed; left:0px; bottom:0px; height:30px; width:100%; background:rgb(120, 194, 173);(120, 194, 173); color: white;">
				      <p style="text-align:center; top:10px;">Copyright ⓒ 프로듀스SM. All rights reserved.</p>
				    </div>
        </body>
    </html>
		<?php
				}else if((isset($_SESSION['userid'])&&($_SESSION['state']=='0'))){
						echo "<script>alert('마이페이지에서 인증 후 사용하실 수 있습니다.'); location.href='../../page/list.php'; </script>";
		    }else{
					echo "<script>alert('로그인이 필요합니다.'); location.href='../../page/list.php'; </script>";
		    }
		?>
