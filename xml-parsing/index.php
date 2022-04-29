<?php


function handleXml($content)
{
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->loadXML($content, LIBXML_NSCLEAN);
    $cells = $xml->getElementsByTagName('table-cell');

    $cells = iterator_to_array($cells);
    $cells = array_map(function ($cell) {
        $childNodes = $cell->firstChild->childNodes;
        // $test = $childNodes[2]->nodeValue;
        // var_dump($test);
        // var_dump($childNodes->length);
        if ($childNodes->length > 2 && $childNodes[2]->nodeValue !='') {
            return $childNodes[2]->nodeValue;
        }else if($childNodes->length > 1){
            return $childNodes[1]->nodeValue;
        }
        return $cell->nodeValue;
    }, $cells);
    // $cells = array_chunk($cells, 3);

    return $cells;
}

function extractDoc($plik)
{
    $filename = __DIR__ . "/$plik";
    $zip = new ZipArchive();
    if ($zip->open($filename)) {
        $contentFile = $zip->getFromName('content.xml');
        $zip->close();
        if ($contentFile) {
            return handleXml($contentFile);
        }
    }
    return false;
}

$cells = extractDoc('30-zadanie.odt');
// foreach ($cells as $cell) {
//     echo "<pre>$cell</pre>";
// }
function mtcombine($array){
        
    $cells_keys = [];
    $array_length = sizeof($array);
    $i = 0;
    do{
        array_push($cells_keys, $array[$i]);
        unset($array[$i]);
        // var_dump($i);
        $i = $i+2;
    }while ($i<$array_length);
    $array = array_values($array);
    // var_dump($cells);
    // var_dump($cells_keys);
    return array_combine($cells_keys, $array);
}
// var_dump($cells);
// var_dump(sizeof($cells));

$i = 2;
$special_cells = [];
// var_dump($cells);
$array_length = sizeof($cells);
do{
    array_push($special_cells, $cells[$i]);
    unset($cells[$i]);
    // var_dump($i);
    $i = $i+3;
    // var_dump(sizeof($cells));
}while($i<$array_length);
// var_dump($special_cells);
$cells = array_values($cells);
// var_dump($cells);


// array_splice($special_cells,1,0,'Ścierzka' );
// var_dump($special_cells);
$offset;
$tmp_size = sizeof($special_cells);
for($x = 0; $x<$tmp_size; $x++){
    preg_match('/(^[1-5]{1}\S{2}[4,5])/', $special_cells[$x], $matches);
    if($matches){
        array_splice($special_cells,$x,0,"Klasa");
        $x++;
        
        
    }
    preg_match('/([a-z]{1,2}){1,2}\/([1-5][a-z]{2}[4,5])(\/|)(\d{2}|)/', $special_cells[$x], $matches2);
    if($matches2){

        array_splice($special_cells,$x,0,"Ścieżka");
        $x++;
        
    }
}

// var_dump($special_cells);

$ar1 = mtcombine($cells);
$ar2 = mtcombine($special_cells);



// var_dump($last_array);

// var_dump($special_cells);
// $special_cells_keys = [];
// $array_length = sizeof($special_cells);
// $i = 0;
// do{
//     array_push($special_cells_keys, $special_cells[$i]);
//     unset($special_cells[$i]);
//     // var_dump($i);
//     $i = $i+2;
// }while ($i<$array_length);
// // var_dump($special_cells);
// // var_dump($special_cells_keys);
// $array2 = array_combine($special_cells_keys, $special_cells);
// var_dump($array2);
// var_dump($array1);
$result = array_merge($ar1, $ar2);
// var_dump($result);
foreach ($result as $key => $value) {
    echo "<pre>$key => $value</pre>";
}

