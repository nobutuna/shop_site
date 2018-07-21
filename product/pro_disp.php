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

$sql = 'SELECT name , price , gazou FROM mst_product WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $pro_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro_name =$rec['name'];
$pro_price=$rec['price'];
$pro_gazou_name =$rec['gazou'];

$dbh = null ;

if($pro_gazou_name == ''){
	$disp_gazou='';
}else{
	$disp_gazou = '画像 <br> <img src="./gazou/'.$pro_gazou_name.'">';
}
}catch(Exception $e){
print'ただいま障害によりご迷惑をおかけしております。';
exit();
}
?>

商品情報参照<br><br>
商品コード<br>
<?php print $pro_code;  ?><br><br>
商品名<br>
<?php print $pro_name; ?><br><br>
価格<br>
<?php print $pro_price; ?>円<br><br>
<?php print $disp_gazou; ?><br>
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>

</body>
</html>
