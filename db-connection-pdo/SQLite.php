<?php
    class Dbc {
        private $db = null;
        private $msgs = [];
 
        public function __construct($file) {
            $dsn = "mysql:host={$file}.db";
            try {
                $this->db = new PDO($dsn);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if($this->db !== null) {
                    $this->msgs[] = 'Connected';
                }
            } catch (PDOException $e) {
                $this->msgs[] = 'Unable to connect';
                // new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
 
        public function close() {
            $this->db->close();
        }
 
        public function setMsg($text) {
 
        }
 
        public function getMsg() {
            var_dump($tis->msgs);
        }
    }
?>