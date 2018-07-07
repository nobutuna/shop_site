<?php
//セッション開始
session_start();
?>

<!DOCTYPE html>
<head>
<title>セッション開始ページ</title>
</head>

<body>
<div>
セッション確認用リンク<br>
<?php
$_SESSION["coupon"] = "ABC123";
?>
<a href="goal_page.php">次のページへ</a>
</div>
</body>
</html>
