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