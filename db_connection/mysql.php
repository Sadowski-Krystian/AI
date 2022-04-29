<?php
$rn = "\r\n";
ini_set('display_errors', 1);
error_reporting(E_ALL);

class dbc{
    public $link = null;
    private $errNo = 1;
    private $errMsg = "None";

    public function __construct(String $host, String $user, String $pass, String $base){
        $this->link = new mysqli($host, $user, $pass, $base);
        $this->errNo = $this->link->connect_errno;
        $this->errmsg = $this->link->connect_error;
        if(is_numeric($this->errNo) && $this->errNo !==0){
            echo $this->errMsg;
        }else{
            $this->link->set_charset("utf8");
            $conn = $this->link->get_charset();
        }
        return $this->link;
    }
}

$host = "localhost";
$user = "root";
$pass = "Student123!";
$base = "wp_Sadowski";
$db = new dbc($host, $user, $pass, $base);
$ver = $db->link->query("SELECT VERSION()");
var_dump($ver);
include('cos.php');
$res = $db->link->query("SELECT * FROM wp_users");
while($row = $res->fetch_array()){
    echo "{$row['ID']} {$row['user_login']} {$row['user_nicename']} {$row['user_email']}<br>{$rn} ";
}