<?php
$link = $_POST['url'];
$file = file($link);
$dir = $_POST['dir'];
$name = $_POST['name'];

if(endsWith($dir, '/') || $dir =" "){
    $dir =$dir.$name;
}else{
    $dir = $dir.'/'.$name;
}

var_dump($dir);
if(file_exists($name)){
    unlink($name);
}
    $f = fopen($dir, 'a') or die("Unable to open file!");
    $words = ['href="', 'src="'];
    foreach($file as $line){
        foreach($words as $word){
            if(strpos($line, $word)){
                $line = str_replace($word, $word.$link, $line);
                
                
            }
        }
        fwrite($f, $line);
        
    }
    fclose($f);

    function endsWith($string, $endString)
    {
        $len = strlen($endString);
        if ($len == 0) {
            return true;
        }
        return (substr($string, -$len) === $endString);
    }
/*

$myfile = fopen($name, "a");
if ($myfile) {
    while(!feof($myfile)) {
        $line = fgets($myfile);
        
        
    }
    fclose($myfile);
}*/



?>