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
  </head>
  <body>
    <article class="container">
        <div class="page-header">
          <br />
          <h1>ログイン</h1>
          <hr />
        </div>
        <form action="../member/login_ok_jp.php" method="post" enctype="multipart/form-data" id="log_ta">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
              <label for="name">ID</label>
              <input type="text" class="form-control" name="userid" placeholder="IDを入力してください。">
            </div>

            <div class="form-group">
              <label for="password">パスワード</label>
              <input type="password" class="form-control" name="userpw" placeholder="パスワードを入力してください。">
            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-info">ログイン<i class="fa fa-check spaceLeft"></i></button>
            </div>
        </div>
      </form>

      </article>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- <script src="../js/signup.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
    $('.tabs .tab').click(function(){
      if ($(this).hasClass('signin')) {
        $('.tabs .tab').removeClass('active');
        $(this).addClass('active');
        $('.cont').hide();
        $('.signin-cont').show();
      }
      if ($(this).hasClass('signup')) {
        $('.tabs .tab').removeClass('active');
        $(this).addClass('active');
        $('.cont').hide();
        $('.signup-cont').show();
      }
    });
    $('.container .bg').mousemove(function(e){
      var amountMovedX = (e.pageX * -1 / 30);
      var amountMovedY = (e.pageY * -1 / 9);
      $(this).css('background-position', amountMovedX + 'px ' + amountMovedY + 'px');
    });

  </script>
  </body>
</html>
