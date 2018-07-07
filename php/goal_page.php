<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>セッション確認用ページ</title>
</head>
<body>
<div>
	<?php
		if(isset($_SESSION["coupon"])){
			$coupon = $_SESSION["coupon"];
			$coupon_list = ["ABC123" , "XYZ999"];
			if(in_array($coupon, $coupon_list)){
				echo $coupon , "は正しいクーポンです。";
			}else{ 
				echo $coupon , "は誤ったクーポンです。";
			}
		}else{
			echo "セッションエラーです";
		}
	?>
</div>
</body>
</html>
