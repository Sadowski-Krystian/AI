<?php
$setBtn = isset($_POST['setBtn']) ? $_POST['setBtn'] : null;

if($setBtn !== null){
    
    $msg;
    $usrFile = isset($_FILES['fileToUpload']) ? $_FILES['fileToUpload'] : null;
    $klasa = isset($_POST['clas']) ? $_POST['clas'] : null;
    $zad = isset($_POST['zad']) ? $_POST['zad'] : null;
    $przedm = isset($_GET['id']) ? $_GET['id'] : null;
    $imie = isset($_POST['Imie']) ? $_POST['Imie'] : null;
    $nazwisko = isset($_POST['Nazwisko']) ? $_POST['Nazwisko'] : null;
    $filename = $klasa .'-'.$przedm.'-'. $zad .'-' .$imie;
    
    $date = date(DATE_RFC822);
    if (!file_exists($klasa)) {
        mkdir($klasa, 777, true);
    }
    if (!file_exists($klasa.'\\'.$zad)) {
       mkdir($klasa.'\\'.$zad, 777, true);
    }
    echo $filename;
    $extension = substr($usrFile['name'] , strrpos($usrFile['name'] , '.') +1);
    var_dump(uploadFile($usrFile['tmp_name'], $klasa.'\\'.$zad, $filename, $extension));
    var_dump($usrFile['name']);
    $list = array (
        array($klasa, $zad ,$przedm, $imie, $nazwisko, $date)
      );
    $file = fopen("log.csv","a");
    foreach ($list as $line) {
        fputcsv($file, $line);
        
    }
    fclose($file);
    
}

function uploadFile($existingFile, $target, $newName, $ext) : bool{
    $destination = dirname(__FILE__).'\\'.$target.'\\'.$newName.'.'.$ext;
var_dump($destination);

    $res = move_uploaded_file($existingFile, $destination);
    $msg = (($res === true)? "U": "Nie u").'dało przenieść do '.$destination;
    return $res;
}


$form = "<form action='form.php?id=AI' method='POST' enctype='multipart/form-data'>";
$form .= "<label for='clas'>Wybierz klase</label><br>";
$form .="<select name='clas' id='clas'>";
$form .="<option value='1PT4'>1PT4</option>";
$form .="<option value='2PT4'>2PT4</option>";
$form .="<option value='3PT4'>3PT4</option>";
$form .="<option value='3PT5'>3PT5</option>";
$form .="</select><br>";
$form .= "<label for='zad'>Wybierz zadanie</label><br>";
$form .="<select name='zad' id='zad'>";
$form .="<option value='Arkusz Skontrum'>Arkusz Skontrum</option>";
$form .="<option value='Formularz'>Formularz</option>";
$form .="<option value='Instalacja Django'>Instalacja Django</option>";
$form .="<option value='Sprawozdanie WEBSocket'>Sprawozdanie WEBSocket</option>";
$form .="</select><br>";
$form .= "<label>Imie</label><br>";
$form .= "<input name='Imie' type='text'><br>";
$form .= "<label>Nazwisko</label><br>";
$form .= "<input name='Nazwisko' type='text'><br>";
$form .= "<input type='file' name='fileToUpload'/><br>";
//$form .= "<input type='file' name='nazwa_pliku' /><br>";
$form .= "<button type='submit' name='setBtn'>Wygeneruj plik</button>";
$form .="</form>";
echo $form;
?>