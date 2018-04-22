<!DOCTYPE html>
<html lang="zh_Hant">
<head>
	<meta charset="utf-8">
	<title>討論版</title>
</head>
<body>

<a href="add_message.html">新增主題</a>
<?php 
//連接資料庫
require('db.php');
if($_SESSION['is_login']=='0'){ ?>
	<a href="login.html">登入</a>
<?php }

if($_SESSION['is_login']=='1'){ ?>
	<a href="logout.php">登出</a>
<?php } ?>
<?php

//echo $_SESSION['is_login'];

//查詢
//等同 $stmt = $db->query('select * from message');
$stmt = $db->prepare('select * from message');
$stmt->execute();

echo '<table border=1>';  //border=1 事後請改用CSS處理
while($row = $stmt->fetch()){  //小心,此處的=號是把右邊的值存往左側
	echo '<tr>';
	echo '<td>'.$row['message_id'].'</td>';
	echo '<td>'.$row['message_name'].'</td>';
	echo '<td>'.$row['message_content'].'</td>';
	echo '<td>'.$row['created_at'].'</td>';
	echo '<td>';
	echo '<a href="view.php?message_id='.$row['message_id'].'">查看主題與留言</a> | ';
	//echo '<a href="edit.php?message_id='.$row['message_id'].'">修改</a> ';
	//echo '<a href="delete.php?message_id='.$row['message_id'].'">刪除</a>';
	//echo '<a href="add_form2.html?message_id='.$row['message_id'].'">留言</a> | ';
	//echo '<a href="add_form_noname.html?message_id='.$row['message_id'].'">匿名留言</a> ';
	echo '</td>';
	echo '</tr>';
}
echo '</table>';
?>
</body>
</html>