<?php


//連接資料庫
require('db.php');

$stmt = $db->prepare('delete from topic where topic_id=?');
$stmt->execute([$_GET['topic_id']]);

header('Location: list.php',TRUE,303);  //沒寫,TRUE,333也可以，但是..
