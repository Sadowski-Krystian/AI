<?php
$zip = new ZipArchive();
$path = "./pack/";
$date = date("Y-m-d H:i:s");
$fileName = date("Ymd_His").'.zip';
$pathFile = $path.$fileName;
var_dump($zip);
if($zip->open($pathFile, ZipArchive::CREATE!==TRUE)){
    echo "Error opening ";
}


var_dump($zip); 
$zip->addFromString("info.txt", "Author: GP\r\n{$date}"); 
$zip->addFile("zip2.php"); 
$zip->setArchiveComment("Author: GP @ ". $date); 
echo "No.files: ".$zip->numFiles; 
var_dump($zip);
 $zip->close(); // zamknij tworzenie pliku
  ?>
