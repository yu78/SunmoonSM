<?php
include "../../db.php";

$rno = $_GET['idx'];
$sql = mq("select * from trade_reply where idx='".$rno."'");
$trade_reply = $sql->fetch_array();

$sql = mq("delete from trade_reply where idx='".$rno."'");
echo "<script>alert('댓글이 삭제되었습니다.');</script>"
?>
<script type="text/javascript">history.back();</script>
