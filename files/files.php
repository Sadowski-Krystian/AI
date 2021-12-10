<!-- Kolejnośc sortowania
Wyświetlaj tylko katalogi 
wyswietlaj tylko pliki
wyswietlaj pliki i katalogi
nie systomowe
nie skrypt --> 

<?php
$dir = dirname(__FILE__);
$setBtn = isset($_POST['setBtn']) ? $_POST['setBtn'] : null;
$msg = "";

if($setBtn !== null){
    
    $msg = "Przesłałeś Formularz";
    $fileName = isset($_POST['fileName']) ? $_POST['fileName'] : null;
    $context = isset($_POST['context']) ? $_POST['context'] : null;
    if(!stristr(substr($fileName,-4), '.txt')){
        $fileName.='.txt';
    }
    if(is_writeable($dir)){
        $save = file_put_contents($fileName, $context);
        if($save === false){
            $msg = "Nie udało sie zapisać pliku";
        }else{
            $msg = "Zapis pomyslny do ".$fileName;
        }
    }else{
        $msg = "Brak uprawnień zapisu w".$dir;
    }
    
}

$co = 'dir';

$tab = [
    'type' => 'all',
    'ord' => false,
    'no' => ['..', '.', 'files.php']
];

function listDir($dir, $co='all', $ord=false){
    $lst = scandir($dir, $ord);
    foreach($lst as $node){
        if($node != "files.php" && strlen($node)>2){
            $x = is_executable($node) ? ' [x] ' : ' - ';
            $r = is_readable($node) ? ' [r] ' : ' - ';
            $w = is_readable($node) ? ' [w] ' : ' - ';
            $isdir = is_dir($node) ? ' dir ' : ' file ';
            $size = filesize($node).'b';
            if($co == 'all'){
                
                $ls[] = $node.$r.$w.$x.$isdir.$size;
            
            }else if($co == filetype($node)){
                $ls[] = $node.$r.$w.$x.$isdir.$size;
            }
            
            
        }
        
    }
    return $ls;
}

$fBody = "<label>Nazwa Pliku</label>";
$fBody .= "<input type='text' name='fileName'/><br>";
$fBody .= "<label>Treść</label>";
$fBody .= "<textarea name='context'></textarea><br>";
$fBody .= "<button type='submit' name='setBtn'>Zapisz</button>";

echo "<form action='files.php' method='POST'>".$fBody."</form>";
echo "<br><p>".$msg."</p><br>";
$types = "<label>Pliki</label><input type='radio' name='types' value='file'/><label>Katalogi</label><input type='radio' name='types' value='dir'/><label>Pliki i Katalogi</label><input type='radio' name='types' value='all'/>";
echo $types;
echo "<h3>Lista Plików</h3>";
$lst = listDir($dir);
var_dump($lst);
#cos
?>

