<?php
include("menu.php");
$hTxT = "<h3>Zagadnienia</h3>";
$li = "<li>Obsługa sesji</li>";
$li .= "<li>Obsługa cisateczek</li>";
$li .= "<li>Obsługa formularza</li>";
$ul = "<ul>".$li."</ul>";
echo $hTxT.$ul;
echo "<h3>Witaj ".($user ? $user : "gosciu")."!</h3>"

?>