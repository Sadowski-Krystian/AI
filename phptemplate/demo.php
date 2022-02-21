<?php
echo '<h1>Dostępne szablony</h1>';
$tplPath = 'template/';
$tplFile = 'confirmation.php';
$pathFile = $tplPath . $tplFile;
function loadTpl($file, $args = null){
    include($file);
    return $out;
}

$person1 = array(
    'imie'=>'Krystian',
    'nazwisko'=>'Sadowski',
    'event'=>'Szkolenie',
    'opis'=>'ważne szkolenie',
    'data'=>'2022-02-16',
    'miejsce'=>'Gorzów WLKP.',
);

if(file_exists($pathFile)){
    $echo = loadTpl('lib.tplt.php' ,$pathFile);
    loadTpl($pathFile, $person1);
    echo $echo;
}else{
    echo 'brak wybranych szablonów';
}

?>
