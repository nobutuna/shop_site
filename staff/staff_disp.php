<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ロクマル農園</title>
</head>
<body>

<?php
try{
$staff_code = $_GET['staffcode'];

$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
$user= 'nobutuna';
$password = 'Nobutuna9';

$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT name FROM mst_staff WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $staff_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$staff_name=$rec['name'];
$dbh = null ;

}catch(Exception $e){
print'ただいま障害によりご迷惑をおかけしております。';
exit();
}
?>

スタッフ情報詳細<br><br>
スタッフコード<br>
<?php print $staff_code;  ?><br><br>
スタッフ名<br>
<?php print $staff_name; ?><br><br>
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>

</body>
</html>
