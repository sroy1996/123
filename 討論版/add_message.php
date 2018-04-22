<?php

//連接資料庫
require('db.php');

//echo "連線成功";
if( !isset($_POST['message_name'])){
	$stmt = $db->prepare('insert into message (message_name,message_content,created_at) values (?,?,?)');
	$stmt->execute(['匿名',$_POST['message_content'],date('Y-m-d H:i:s')]);
}else{
	$stmt = $db->prepare('insert into message (message_name,message_content,created_at) values (?,?,?)');
	$stmt->execute([$_POST['message_name'],$_POST['message_content'],date('Y-m-d H:i:s')]);

}


//echo '新增了';
//echo $stmt->rowCount();
//echo '筆資料';

header('Location: list.php',TRUE,303);  //沒寫,TRUE,333也可以，但是..
