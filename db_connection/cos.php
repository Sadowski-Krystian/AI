<?php
echo '<h3>Zapis do DB</h3>'.$rn;
$tbl = 'wp_users';
$col = 'ID, user_login,user_nicename, user_email';
$opt = '0, "user", "student", "local@local.local"';
$save = "INSERT INTO {$tbl} ({$col}) VALUES ({$opt});";
echo $save;
$newId = $db->link->query($save);
var_dump($newId);
var_dump($db->link->insert_id);

$col = "user_nicename='cos'";
$opt ="ID=4";
$update = "UPDATE {$tbl} SET {$col} WHERE {$opt};";
echo $update;
$updId = $db->link->query($update);
var_dump($updId);
var_dump($db->link->insert_id);
var_dump($db->link->affected_rows);