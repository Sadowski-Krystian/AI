<?php

if (session_status() == 1){
    session_start();
    echo "OFF";
}else{
    echo "ON";
}
$ck = $_COOKIE['userId'];

$user = array_key_exists('userName', $_SESSION) ? $_SESSION['userName'] : false;

var_dump($ck);
var_dump($user);
//$_SESSION["test"] = "Beta Testy";
//unset( $_SESSION["test"]);
//var_dump(session_status());
if($user){
    $logLink = "<a href='Logout.php'>Log OUT</a>";
}else{
    $logLink = "<a href='Login.php'>Log IN</a>";
}

echo "<nav>
    <a href='demo.php'>Main</a>
    <a href='form.php'>Form</a>
    ".$logLink."
    </nav>";

?>