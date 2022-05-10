<?php
    class Users {
        private $db;

        public function __construct($dbc) {
            $this->db = $dbc;
        }

        public function add($dane) {
            $pfx = '';
            $tbl = 'cmsUsers '.$pfx;
            $cols = 'id, active, logTry, lastLogin, email, user, name, surname, passwd, token';
            $sql = "INSERT INTO {$tbl} ({$cols}) VALUES (0, 1, 0, '2022-05-10 14:24:00', :email, :user, :name, :surname, :passwd, 'nowy')";
            $stmt = $this->db->db->prepare($sql);
            return $stmt->execute($dane);
        }

        public function list($filter=null) {
            $pfx = 'cu';
            $tbl = 'cmsUsers '.$pfx;
            $cols = 'id, email, user, name, surname, passwd, token';
            $whr = '';
            if(is_array($filter)) {
                $colArr = explode(', '.$cols);
                foreach($filter as $key=>$val) {
                    if(in_array($key, $colArr)) {
                        $whr = ($whr=='' ? ' WHERE ' : ' AND ')."{$pfx}.{$key}='{$val}'";
                    }
                }
            }
            $query = 'SELECT '.$cols.' FROM '.$tbl.$whr;
            echo $query;
            $stmt = $this->db->db->prepare($query);
            $stmt->execute();
            $lst = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $lst;
        }

        public function edit($id, $data=null) {

            $pfx = 'cu';
            $tbl = 'cmsUsers '.$pfx;
            $cols = 'id, email, user, name, surname, passwd, token';
            $colArr = explode(', '.$cols);
            foreach ($colArr as $fld) {
                $data[$fld] = $_POST[$fld];
            }
            $set = '';
            $setArr = [];
            if(is_array($data)) {
                foreach ($data as $key => $value) {
                    if(in_array($key, $colArr)) {
                        $set.= ($set == '' ? '' : ', ').$key.'=?';
                        $setArr[] = $val;
                    }                    
                }
                $setArr[] = $id;
            }
            $query = "UPDATE {$tbl} SET {$SET} WHERE id=?";
            echo $query;
            var_dump($setArr);
            try {
                $stmt = $this->db->db->prepare($query);
                $stmt->execute($setArr);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            return $stmt->rowCount();
        }
    }
?>