<?php
header('Content-Type: text/html; charset=utf-8');

include "../../db.php";

function output($stream, $message)
{
    if ($stream) {
        // CLI - output to given stream
        fputs($stream, $message);
    } elseif (ob_get_level()) {
        // Web but output buffering is on - bypass it
        $buffer = ob_get_clean();
        echo $message;
        flush();
        ob_start();
        echo $buffer;
    } else {
        // Web without output buffering
        echo $message;
        flush();
    }
}
if (!defined('STDOUT'))
    define('STDOUT', null);
if (!defined('STDERR'))
    define('STDERR', null);

if(isset($_SESSION['userid'])){
$name = $_SESSION['userid'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
$hit = 0;

$tmpfile =  $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']); //iconv은 인코딩설정을 바꿔줌
$folder = "../../upload/".$filename;
move_uploaded_file($tmpfile,$folder);

#$sql = mq("insert into free_board(name,title,content,date,hit) values ('".$name."','".$_POST['title']."','".$_POST['content']."','".$_POST['date']."', 0)");
$sql = mq("insert into free_board(name,title,content,file,date,hit) values ('$name', '$title', '$content', '$o_name' ,'$date', 0)");
echo "<script>alert('글쓰기 완료되었습니다.');</script>";

?>
<meta http-equiv="refresh" content="0 url=../list.php" />
<?php
    }else{
      echo "<script>alert('로그인이 필요합니다.'); location.href='../../index.php'; </script>";
    }
?>
