<?php
include("menu.php");
$secure = false;
$uid = 13;
$setBtn = isset($_POST['setBtn']) ? true : false;
var_dump($setBtn);
if($setBtn){
	$login = isset($_POST["login"]) ? $_POST["login"] : null;
	$password = isset($_POST["passwd"]) ? $_POST["passwd"] : null;
	$keap = isset($_POST["remember"]) ? true : false;
	if($login=="root" && $password="O5"){
		$msg ="ACCES GRANTED";
		$_SESSION["userID"] = $uid;
		$_SESSION["userName"] = $login;
		if($keap){
			echo "zapamiętaj mnie";
			$name = "userId";
			$body = $uid;
			$host = "localhost";
			$time = 300;
			$exptime = time()+$time;
			setcookie($name, $body, $exptime, "/", $host, false, false);
		}
	}else{
		$msg = "ACCES RESTRICTED";
	}
}
if($secure==false || ($secure == true && $_SERVER["HTTPS"])){
	$hTxt = '<p>Podaj login i hasło</p>';
	$lbl1 = '<label>Login</label>';
	$inp1 = '<input type="text" name="login" /><br/>';
	$lbl2 = '<label>Hasło</label>';
	$inp2 = '<input type="password" name="passwd" /><br/>';
	$cb1 = '<input type="checkbox" name="remember" />';
	$lbl3 = '<label>'.$cb1.'Zapamiętaj mnie</label><br/>';
	$setBtn = '<button type="submit" name="setBtn">Zaloguj</button>';
	$form = $hTxt.$msg.'<form action="" method="POST">'.$lbl1.$inp1.$lbl2.$inp2.$lbl3.$setBtn.'</form>';
	
}else{
	$form = "Brak szyfrowanego połączenia - logowanie nie możliwe";
}
echo $form;
	
?>

