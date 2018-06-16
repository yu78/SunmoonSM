<?php include "../db.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>프로듀스SM</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <!-- Custom style -->
    <link rel="stylesheet" href="../css/style.css" media="screen" title="no title" charset="utf-8">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script>
    $(document).ready(function(e) {
    	$(".check").on("keyup", function(){ //check라는 클래스에 입력을 감지
    		var self = $(this);
    		var userid;
        var student_idx;

        if(self.attr("id") === "userid"){
          userid = self.val();
        } else if(self.attr("student_idx")==="student_idx") {
          student_idx = self.val();
        }

    		// $.post( //post방식으로 id_check.php에 입력한 userid값을 넘깁니다
    		// 	"id_check_en.php",
    		// 	{ userid : userid },
    		// 	function(data){
    		// 		if(data){ //만약 data값이 전송되면
    		// 			self.parent().parent().find("div").html(data); //div태그를 찾아 html방식으로 data를 뿌려줍니다.
    		// 			self.parent().parent().find("div").css("color", "#F00"); //div 태그를 찾아 css효과로 빨간색을 설정합니다
    		// 		}
    		// 	}
    		// );
    	});
    });
    </script>

    <!--단과대, 학부선택 콤보박스-->
    <script>
		function categoryChange(e) {
      var college_a = ["국어국문학과", "상담심리사회복지학과", "역사문화콘텐츠학과", "미디어커뮤니케이션학과", "법.경찰학과", "글로벌한국학과", "시각디자인학과"];
      var college_b = ["외국어자율전공학부", "글로벌경영학과", "IT경영학과", "국제경제통상학과", "국제레저관광학과", "국제관계.행정학부", "글로벌행정학과(주)", "글로벌행정학과(야)", "영어학과", "러시아어학과", "일어일본학과", "중어중국학과", "스페인어중남미학과"];
      var college_c = ["신학순결학과"];
      var college_d = ["제약생명공학과", "식품과학.수산생명의학부", "간호학과", "물리치료학과", "치위생학과", "응급구조학과", "스포츠과학부"];
      var college_e = ["건축사회환경공학부", "기계ICT융합공학부", "스마트자동차공학부", "전자공학과", "컴퓨터공학부", "글로벌소프트웨어학과", "신소재공학과", "환경생명화학공학과", "산업경영공학과", "3D창의융합학과"];
		  var target = document.getElementById("major");

		  if(e.value == "인문사회대학") var d = college_a;
		  else if(e.value == "글로벌비즈니스대학") var d = college_b;
		  else if(e.value == "신학순결대학") var d = college_c;
      else if(e.value == "건강보건대학") var d = college_d;
      else if(e.value == "공과대학") var d = college_e;
		  target.options.length = 0;

		  for (x in d) {
		    var opt = document.createElement("option");
		    opt.value = d[x];
		    opt.innerHTML = d[x];
		    target.appendChild(opt);
		  }
		}
		</script>

  </head>
  <body>
    <article class="container">
        <div class="page-header">
          <br />
          <br />
          <h1>Sign up</h1>
          <hr />
        </div>
        <form action="../member/member_ok_en.php" method="post" enctype="multipart/form-data" name="memform">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
              <label for="name">ID</label>
              <input type="text" name="userid" class="form-control" placeholder="Please input your ID.">
            </div>


            <div class="form-group">
              <label for="text">Email</label>
              <input type="text" class="form-control" name="email" placeholder="Please input your Email.">
              <input type"text" name="emadress" class="form-control" value="@sunmoon.ac.kr" readonly>
            </div>


            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="userpw" placeholder="Please input your password.">
            </div>

            <div class="form-group">
              <label for="text">student ID number</label>
              <input type="text" class="form-control" name="student_idx" placeholder="Please input your student ID number.">
            </div>

            <!-- <div class="form-group">
              <label for="InputPassword2">비밀번호 확인</label>
              <input type="password" class="form-control" id="Password2" placeholder="비밀번호 확인">
              <p class="help-block">비밀번호 확인을 위해 다시 한번 입력 해 주세요</p>
            </div> -->

            <?php
              $sql = mq("select * from college");
            ?>
            <div class="form-group">
              <label for="college_name">College</label>
              <select name="college_name" class="custom-select" onchange="categoryChange(this)">
                <option>College</option>
                <?php while($college = $sql->fetch_array()) { ?>
                  <option value=<?php echo $college['college_name']; ?>><?php echo $college['college_name']; ?></option>
                <?php } ?>
              </select>

            <br><label for="major_name">Major</label>
            <select name="major_name" class="custom-select" id="major">
            <option>Major</option>
          </select>

          </div>


            <div class="form-group text-center">
              <button type="submit" class="btn btn-info">Join<i class="fa fa-check spaceLeft"></i></button>
              <button type="button" class="btn btn-warning" onClick='self.close()'>Cancel</button>
              <!-- <button class="btn btn-default" data-dismiss="modal" aria-label="Close">Cancel</button> -->
            </div>
        </div>
      </form>

      </article>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
