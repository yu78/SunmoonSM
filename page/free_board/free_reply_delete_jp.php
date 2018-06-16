<?php
include "../../db.php";

$rno = $_GET['idx'];
$sql = mq("select * from free_reply where idx='".$rno."'");
$free_reply = $sql->fetch_array();

$sql = mq("delete from free_reply where idx='".$rno."'");
echo "<script>alert('コメントが削除されました。');</script>"
?>
<script type="text/javascript">history.back();</script>
