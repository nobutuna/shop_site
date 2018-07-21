<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ロクマル農園</title>
</head>
<body>

<?php
try{
$pro_code = $_GET['procode'];

$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
$user= 'nobutuna';
$password = 'Nobutuna9';

$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT name , gazou  FROM mst_product WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $pro_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro_name=$rec['name'];
$pro_gazou_name = $rec['gazou'];
$dbh = null ;

if($pro_gazou_name == ''){
	$gazou_disp = '';
}else{
	$gazou_disp = '画像<br><img src="./gazou/'.$pro_gazou_name.'"><br><br>';
}

}catch(Exception $e){
print'ただいま障害によりご迷惑をおかけしております。';
exit();
}
?>

商品削除<br><br>
商品コード<br>
<?php print $pro_code;  ?><br><br>
商品名<br>
<?php print $pro_name; ?><br>
<?php print $gazou_disp; ?>
この商品を削除してよろしいですか?<br><br>
<form method='post' action="pro_delete_done.php">
<input type="hidden" name="code" value="<?php print $pro_code; ?>">
<input type="hidden" name="gazou_name" value="<?php print $pro_gazou_name; ?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>
</html>
