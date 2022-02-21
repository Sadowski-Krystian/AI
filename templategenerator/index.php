<?php 
$tplPath = 'template/';
$tplFile = 'confirmation.php';
$pathFile = $tplPath . $tplFile;
$persons = [];
$persons = getCsv($persons);


if(file_exists($pathFile)){
    foreach ($persons as $person) {
        loadTpl($pathFile, $person);
        file_put_contents('cos.html', file_get_contents('http://localhost/AINEW/templategenerator/index.php'));
    }
    
}else{
    echo 'brak wybranych szablonów';
}
function getCsv($persons){
    if (($fp = fopen('persons.csv', "r")) !== FALSE) 
    {
        while (($row = fgetcsv($fp)) !== FALSE) 
        {
            array_push($persons, $row);
        }
    fclose($fp);
    }
    return $persons;
}
function loadTpl($file, $args = null){
    include($file);
}

?>