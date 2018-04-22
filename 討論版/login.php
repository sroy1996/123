<?php
//連接資料庫
require('db.php');




//查詢
$stmt = $db->prepare('select * from user where user_account = ?');
$stmt->execute([$_POST['user_account']]);
//檢查結果
$row = $stmt->fetch();
if( !$row ){
	echo '帳號不存在';
	//echo '<a href="list.php">回到列表</a>';
	//exit;
} else {
	$stmt = $db->prepare('select * from user where user_password = ?');
	$stmt->execute([md5($_POST['user_password'])]);
	$row = $stmt->fetch();
	if( $row ){
		//echo 'password_1';
		$_SESSION['is_login'] = '1';
		header('Location: list.php',TRUE,303);
	} else {
		echo 'password_0';
		$_SESSION['is_login'] = '0';
		header('Location: login.html',TRUE,303);
	}
}
?>