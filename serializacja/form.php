<?php
$setBtn = isset($_POST['setBtn']) ? $_POST['setBtn'] : null;
$myrestore = isset($_POST['restore']) ? $_POST['restore'] : null;
if($setBtn !== null){
    
    $filename = 'serialize.txt';
    $dane = getValue();

    addSesion($dane);
    $ser = myserialize($dane);
    savetofile($ser, $filename);
    
}
if($myrestore !== null){
    $filename = 'serialize.txt';
    $txt = myreadfile($filename);
    $unser = myunserialize($txt);
    echo resultForm($unser);
    echo restoreForm();
    echo rawData($unser);
}else{
    echo form();
    echo restoreForm();
}

function rawData($array){
    $out ='';
    $rn = "<br>\r\n";
    foreach ($array as $key => $value) {
        if($key == 'data'){
            $value = date ( 'd.M.Y' , $value );
        }
        $out .= $key.' => '.$value.$rn;
    }
    return $out;
}
function resultForm($array){
    
    $rn = "<br>\r\n";
    $f = '';
    foreach ($array as $key => $value) {
        if($key == 'data'){
            $value = date ( 'd.M.Y' , $value );
        }
        $f .= '<label for="klasa">'.$key.'</label><input type="text" name="'.$key.'" value="'.$value.'" />'.$rn;
    }
    
        
        $f.= '<button type="submit" name="setBtn">Zapisz</button>';
        $out = '<form action="'.$_SERVER['PHP_SELF'].'" method="POST">'.$f.'</form>';
        return $out;
}
    
function form()
    {
        
        $rn = "<br>\r\n";
        $f = '<label for="klasa">Klasa</label><input type="text" name="klasa" />'.$rn;
        $f.= '<label for="zadania">Zadanie</label><input type="text" name="zadanie" />'.$rn;
        $f.= '<label for="nazwisko">Nazwisko</label><input type="text" name="nazwisko" />'.$rn;
        $f.= '<label for="imie">Imie</label><input type="text" name="imie" />'.$rn;
        $f.= '<label for="data">Data</label><input type="text" name="data" />'.$rn;
        $f.= '<button type="submit" name="setBtn">Zapisz</button>';
        $out = '<form action="'.$_SERVER['PHP_SELF'].'" method="POST">'.$f.'</form>';
        return $out;
    }
    function restoreForm(){
        $f = '<button type="submit" name="restore">Restore</button>';
        $out = '<form action="'.$_SERVER['PHP_SELF'].'" method="POST">'.$f.'</form>';
        return $out;
    }
    function getValue(){
        $klasa = isset($_POST['klasa']) ? $_POST['klasa'] : null;
        $zadanie = isset($_POST['zadanie']) ? $_POST['zadanie'] : null;
        $data = isset($_POST['data']) ? $_POST['data'] : null;
        $imie = isset($_POST['imie']) ? $_POST['imie'] : null;
        $nazwisko = isset($_POST['nazwisko']) ? $_POST['nazwisko'] : null;
        $data = strtotime ( $data ); 
        echo date ( 'd.M.Y' , $data );
        $keys = array('klasa', 'zadanie', 'data', 'imie' ,'nazwisko');
        $values = array($klasa, $zadanie, $data, $imie, $nazwisko);
        $dane = array_combine($keys,$values);
        return $dane;
    }
    function addSesion($dane){
        session_start();
        $_SESSION["form"]=$dane;
    }
    function myserialize($data){
        return serialize($data);
    }
    function myunserialize($data){
        return unserialize($data);
    }
    function savetofile($dane, $filename){
        $file = fopen($filename,"w");
        
        fwrite($file, $dane);
            
        fclose($file);
    }
    function myreadfile($filename){
        $file = fopen($filename,"r");
        $newdata = fgets($file);
        
            
        fclose($file);
        return $newdata;
    }
?>