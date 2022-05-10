<?php
    ini_set('display_errors');

    require_once('Dbc.php');
    require_once('SQLite.php');
    require_once('Users.php');
    $rn = "\r\n";

    $mysql = new Dbc('localhost', 'none', 'utf8mb4', 'root', 'Student123!');
    echo $mysql->getMsg();
    $sqlt = new SQLite('zse-tai3');
    echo $sqlt->getMsg();

    $usr = new Users($mysql);
    $add = isset($_GET['addNew']) ? true : false;
    $id = isset($_POST['setId']) ? (int)$_POST['setId'] : 0;
    if($add == true) {
        echo "Dodaj wpis";
        $daneAsc = array(
            'email'=>'new@zsegw.pl', 
            'user'=>'newStudent', 
            'name'=>'New', 
            'surname'=>' Student', 
            'passwd'=>'Student123!'
        );
        $ins = $usr->add($dane);
    }
    if($id>0) {
        $upd = $usr->edit($id);
        var_dump($upd);
    }
    $flt = ['name'=>'Miranda'];
    $data = $usr->list($flt);
?>