<!--- 게시글 수정 -->
<?php
	include "../../db.php";
    if(isset($_SESSION['userid'])&&($_SESSION['state']=='1')){
      $bno = $_GET['idx'];
    	$sql = mq("select * from evaluation where idx='$bno';");
    	$evaluation = $sql->fetch_array();
?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="UTF-8">
    <title>프로듀스SM 강의평가</title>
    <link rel="stylesheet" href="../../css/board.css" />
    <link rel="stylesheet" href="../../css/jquery-ui.css" />
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../js/jquery-ui.js"></script>
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
      <a class="navbar-brand" href="../../../index_jp.php">プロデュースSM</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
      	<span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
      	<ul class="navbar-nav mr-auto">
      		<li class="nav-item active">
      			<a class="nav-link" href="../../page/evaluation_jp.php">講義評価 <span class="sr-only">(current)</span></a>
      		</li>
      		<li class="nav-item">
      			<a class="nav-link" href="../../page/trade_jp.php">講義交換</a>
      		</li>
      		<li class="nav-item">
      			<a class="nav-link" href="../../page/list_jp.php">掲示板</a>
      		</li>
					<?php if($_SESSION['level']==5) { ?>
	         <li class="nav-item">
	           <a class="nav-link" href="../../page/admin/adminlist.php">管理者</a>
	         </li>
	       <?php }?>
	        <li class="nav-item">
	          <a class="nav-link" href="../../page/mypage_jp.php">私のページ</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="../../member/logout_jp.php">ログアウト</a>
	        </li>
      	</ul>
      </div>
    </nav>
  <body>
    <div id="board_write" style="margin-bottom:50px;">
            <div id="write_area">
              <h3>講義評価</h3>
              <small>文を修正します。</small><br><br>
                <div id="icon">
                    <!--- 준비중 -->
                </div>
                <form action="evaluation_modify_ok_jp.php/<?php echo $evaluation['idx']; ?>" method="post">
                    <input type="hidden" name="idx" value="<?=$bno?>">
                    <label>講義の名前</label>
                    <input type="text" name="lectureName" class="form-control" maxlength="20" value="<?php echo $evaluation['lectureName']; ?>" required>
                    <label>教授の名前</label>
                    <input type="text" name="professorName" class="form-control" maxlength="20" value="<?php echo $evaluation['professorName']; ?>" required>
										<label>受講年度</label>
			              <?php
											// 보여질 년도의 범위 - 현재년부터 100년전까지 표시됩니다.
											$yearRange = 10;
											// 선택되어질 년도 - 현재년 기준 20년전의 년도가 선택되어집니다.
											$ageLimit = 10;

											$currentYear = date('Y');
											$startYear = ($currentYear - $yearRange);
											$selectYear = ($currentYear - $ageLimit);
											echo '<select name="lectureYear" class="form-control">';
											foreach (range($currentYear, $startYear) as $year) {
			    							$selected = "";
			    							if($year == $selectYear) { $selected = " selected"; }
			    							echo '<option' . $selected . '>' . $year . '</option>';
											}
											echo '</select>';
											?>
                    <label>受講学期</label>
                    <select name="semesterDivide" class="form-control">
                      <option value="1학기">1学期</option>
                      <option value="여름학기">夏学期</option>
                      <option value="2학기">2学期</option>
                      <option value="겨울학기">冬学期</option>
                    </select>
                    <label>講義区分</label>
                    <select name="lectureDivide" class="form-control">
                      <option value="전공">専攻</option>
                      <option value="교양">教養</option>
                      <option value="기타">その他</option>
                    </select>
                  <label>タイトル</label>
                  <input type="text" name="title" class="form-control" maxlength="20" value="<?php echo $evaluation['title']; ?>" required>
                  <label>内容</label>
                  <textarea type="text" name="content" class="form-control" maxlength="2048" style="height: 180px;" required><?php echo $evaluation['content']; ?></textarea>
                    <label>総点</label>
                    <select name="totalScore">
											<option value="A+">A+</option>
			                <option value="A">A</option>
			                <option value="B+">B+</option>
			                <option value="B">B</option>
			                <option value="C+">C+</option>
											<option value="C">C</option>
											<option value="D+">D+</option>
											<option value="D">D</option>
											<option value="F">F</option>
                    </select>
                    <label>単位</label>
                    <select name="creditScore">
											<option value="A+">A+</option>
			                <option value="A">A</option>
			                <option value="B+">B+</option>
			                <option value="B">B</option>
			                <option value="C+">C+</option>
											<option value="C">C</option>
											<option value="D+">D+</option>
											<option value="D">D</option>
											<option value="F">F</option>
                    </select>
                    <label>出席</label>
                    <select name="comfortableScore">
											<option value="A+">A+</option>
			                <option value="A">A</option>
			                <option value="B+">B+</option>
			                <option value="B">B</option>
			                <option value="C+">C+</option>
											<option value="C">C</option>
											<option value="D+">D+</option>
											<option value="D">D</option>
											<option value="F">F</option>
                    </select>
                    <label>難易度</label>
                    <select name="lectureScore">
											<option value="A+">A+</option>
			                <option value="A">A</option>
			                <option value="B+">B+</option>
			                <option value="B">B</option>
			                <option value="C+">C+</option>
											<option value="C">C</option>
											<option value="D+">D+</option>
											<option value="D">D</option>
											<option value="F">F</option>
                    </select>
                  <button type="button" class="btn btn-secondary" onClick="history.back();">キャンセル</button>
                  <button type="submit" class="btn btn-info">登録</button>
                </form>
            </div>
        </div>
				<!-- footer -->
				<div style="position:fixed; left:0px; bottom:0px; height:30px; width:100%; background:rgb(120, 194, 173);(120, 194, 173); color: white;">
		      <p style="text-align:center; top:10px;">Copyright ⓒ プロデュースSM. All rights reserved.</p>
		    </div>
  </body>
</html>
<?php
  } else{
    echo "<script>alert('ログインが必要です。'); location.href='../../index_jp.php'; </script>";
  }
?>
