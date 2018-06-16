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
$lectureName = $_POST['lectureName'];
$professorName = $_POST['professorName'];
$lectureYear = $_POST['lectureYear'];
$semesterDivide = $_POST['semesterDivide'];
$lectureDivide = $_POST['lectureDivide'];
$Title = $_POST['title'];
$Content = $_POST['content'];
$totalScore = $_POST['totalScore'];
$creditScore = $_POST['creditScore'];
$comfortableScore = $_POST['comfortableScore'];
$lectureScore = $_POST['lectureScore'];

#$sql = mq("insert into free_board(name,title,content,date,hit) values ('".$name."','".$_POST['title']."','".$_POST['content']."','".$_POST['date']."', 0)");
$sql = mq("insert into evaluation(name,lectureName,professorName,lectureYear,semesterDivide,lectureDivide,title,content,totalScore,creditScore,comfortableScore,lectureScore) values
('$name','$lectureName','$professorName','$lectureYear','$semesterDivide','$lectureDivide','$Title','$Content','$totalScore','$creditScore','$comfortableScore','$lectureScore')");
echo "<script>alert('Your writing is complete.');</script>";

?>
<meta http-equiv="refresh" content="0 url=../evaluation_en.php" />
<?php
    }else{
      echo "<script>alert('Login is required'); location.href='../../index_en.php'; </script>";
    }
?>
