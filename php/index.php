<?php
/* Warsztat 2-4: Konwersja danych
 * Ten skrypt demonstruje sposoby wyświetlania różnych typów zmiennych
 * */
#	error_reporting(E_ALL);		# Ta linijka ustawia rodzaj wyświetlanych błędów
#	ini_set('display_errors', 1);	// Ta linijka pozwala wyświetlać błędy
$zmienna1 = 123;
$zmienna21 = 'tekst';
$zmienna22 = '456';
$zmienna3 = false;
$zmienna4 = null;
$zmienna50 = '[5,10,15]';
$zmienna5 = array(5,10,15);
$zmienna6 = array(a=>50,'b'=>100,"c"=>1500);
define('NAZWA','wartość');
echo "<pre>";
echo $zmienna1;
var_dump((string)$zmienna1);
echo $zmienna21;
var_dump((int)$zmienna21);
echo $zmienna22;
var_dump((int)$zmienna22);
echo '_'.$zmienna3;
var_dump((bool)0);
var_dump((bool)'1');
echo '_'.$zmienna4;
var_dump($zmienna4);
echo $zmienna50;
var_dump((array)$zmienna50);
echo $zmienna5;
var_dump((string)$zmienna5);
var_dump((object)$zmienna5);
echo $zmienna6;
var_dump((object)$zmienna6);
echo NAZWA;
print(NAZWA);
echo "</pre>";
?>	