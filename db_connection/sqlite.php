<?php

$rn = "\r\n";
$ver = SQLite3::version();
echo $ver['versionString'].$rn;
echo $ver['versionNumber'].$rn;
var_dump($ver);
$db = new SQLite3("../../ZAW/foodApp/food_project/db.sqlite3");
$ver = $db->querySingle("SELECT VERSION()");
var_dump($ver);

$res = $db->query("SELECT * FROM school_food_dania");
while($row = $res->fetch_array()){
    echo "{$row['nazwa']} {$row['opis']} {$row['ilosc']} {$row['dostepnosc']}<br>{$rn} ";
}