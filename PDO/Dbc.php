<?php
    class Dbc {
        private $db = null;
        private $msgs = [];

        public function __construct($host, $base, $charset, $user, $pass) {
            $dsn = "mysql:host={$host};dbname={$base};charset={$charset}";
            $options = null;
            try {
                $this->db = new PDO($dsn, $user, $pass, $options);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if($this->db !== null) {
                    $this->msgs[] = 'Connected';
                }
            } catch (PDOException $e) {
                $this->msgs[] = 'Unable to connect';
                new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        public function setMsg($text) {

        }

        public function getMsg() {
            var_dump($tis->msgs);
        }
    }
?>