<?php
include("menu.php");
session_destroy();
header("Location: demo.php");
unset($_COOKIE['userId']);
?>