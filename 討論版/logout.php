<?php
//連接資料庫
require('db.php');
$_SESSION['is_login'] = '0';
//session_destroy();
header('Location: list.php',TRUE,303);
?>