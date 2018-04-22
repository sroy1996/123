<?php
//連接資料庫
require('db.php');

//echo "連線成功";
//if( !isset($_POST['topic_name'])){
	$stmt = $db->prepare('insert into topic (topic_name,topic_content,created_at,message_id) values (?,?,?,?)');
	$stmt->execute(['匿名',$_POST['topic_content'],date('Y-m-d H:i:s'),$_POST['message_id']]);
//}else{
	//$stmt = $db->prepare('insert into topic (topic_name,topic_content,created_at,message_id) values (?,?,?,?)');
	//$stmt->execute([$_POST['topic_name'],$_POST['topic_content'],date('Y-m-d H:i:s'),$_POST['message_id']]);
	//$stmt->execute([$_POST['prod'],$_POST['price']]);
//}


//echo '新增了';
//echo $stmt->rowCount();
//echo '筆資料';

header('Location: view.php?message_id='.$_POST['message_id'],TRUE,303);  //沒寫,TRUE,333也可以，但是..