<?php
include "../../db.php";

$rno = $_GET['idx'];
$sql = mq("select * from trade_reply where idx='".$rno."'");
$trade_reply = $sql->fetch_array();

$sql = mq("delete from trade_reply where idx='".$rno."'");
echo "<script>alert('コメントが削除されました。');</script>"
?>
<script type="text/javascript">history.back();</script>
