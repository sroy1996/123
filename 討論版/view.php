<!DOCTYPE html>
<html lang="zh_Hant">
<head>
	<meta charset="utf-8">
	<title>觀看</title>
</head>
<body>
<?php
//取得要編輯的id, 確認格式正確
if( !isset($_GET['message_id']) || empty($_GET['message_id']) || !is_numeric($_GET['message_id']) )
{
	echo '不對';
	echo '<a href="list.php">回到列表</a>';
	exit;
}
//連接資料庫
require('db.php');

//查詢
$stmt = $db->prepare('select * from message where message_id = ?');
$stmt->execute([$_GET['message_id']]);
//檢查結果
$row = $stmt->fetch();
if( !$row ){
	echo '主題不存在';
	echo '<a href="list.php">回到列表</a>';
	exit;
}

//查詢
$stmt2 = $db->prepare('select * from topic where message_id = ?');
$stmt2->execute([$_GET['message_id']]);
//檢查結果
$row2 = $stmt2->fetchAll();
if( !$row2 ){
	echo '無留言';
	echo '<a href="list.php">回到列表</a>';
	//exit;
}
 
?>
<a href="list.php">回到列表</a>
<h1><?php echo $row['message_name']; ?></h1>
<h2><?php echo $row['message_content']; ?></h2>
<hr>

<?php

	echo '<table border=1>';  //border=1 事後請改用CSS處理
	//while($row2 = $stmt2->fetch()){  //小心,此處的=號是把右邊的值存往左側
	foreach($row2 as $data){
	echo '<tr>';
	//echo '<td>'.$data['topic_id'].'</td>';
	echo '<td>'.$data['topic_name'].'</td>';
	echo '<td>'.$data['topic_content'].'</td>';
	echo '<td>'.$data['created_at'].'</td>';
	if($_SESSION['is_login']=='1'){
		echo '<td>';
		echo '<a href="delete.php?topic_id='.$data['topic_id'].'">刪除</a>';
		echo '</td>';
	}
	echo '</tr>';
	}
	echo '</table>';

?>
<form method="POST" action="add_topic.php">
	<input type="hidden" value="0" name="topic_name">
	留言內容：<textarea name="topic_content" rows="4" cols="50"></textarea>
	<input type="hidden" name="message_id" value="<?php echo $_GET['message_id'] ?>">
	<input type="submit"> <a href="list2.php">取消</a>
</form>
	
</body>
</html>