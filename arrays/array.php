<?php

echo 'Tablice';
$notArr = "to nie jest tablica";
$isArr1 = array();
$isArr2 = [];
var_dump(is_array($notArr));
var_dump(is_array($isArr1));
var_dump(is_array($isArr1));
echo "Licznośc Tablicy";
$isArr1 = array(5,10,15);
$isArr2 = ['x'=>13, 'y'=>21];
var_dump(count($isArr1));
var_dump(count($isArr2));
echo "Sprawdź czy w tablicy .. ";
var_dump(in_array(13, $isArr1));
var_dump(in_array(13, $isArr2));
var_dump(array_key_exists('z', $isArr2));
echo "wylistuj klucze i wartośco";
var_dump(array_keys($isArr2));
var_dump(array_values($isArr2));
echo "łaczenie tablic";
var_dump(array_merge($isArr1, $isArr2));
$ones = array_pad($isArr1, 7,1);
var_dump($ones);
var_dump(array_reverse($isArr1));
var_dump(array_reverse($isArr1, TRUE));
echo "Modyfikacje tablicy";
var_dump(array_shift($isArr1));
var_dump(array_push($isArr1, 24));
var_dump(array_pop($isArr1));
var_dump($isArr1);
$tab0 = [7,14,21,32];
$tab1 = [
    'x'=>'5',
    'y'=>'10',
    'z'=>'15',
    'bgColor'=>'#213777',
    'fgColor'=>'#fffeee',
    'border'=>'3px',
    'size'=>'21rem',
];
for($i = 0; $i<count($tab0); $i++){
    echo $tab0[$i].($i==count($tab0)-1?'':', ');
}
foreach ($tab1 as $key => $value) {
    echo "klucz: {$key} Wartość: {$value}<br/>";
}
$ij = 0;
while($ij<count($tab0)){
    echo $tab0[$ij++].', ';
}

?>