<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Player 
{
    private $name;
    public $guild = null;
    private $points = 0;
    public $level = 0;
    private $items = ['scp-207', 'scp-268', 'scp-018', 'scp-330', 'scp-2174', 'scp-500', 'medkit', 'adrenaline', 'pills', 'MTF-Epsilon-11'];
    public $eq = [];

public function __construct( string $name ){
    $this->setName($name);
}

public function getItems() : void{
    for($i = 0; $i<3; $i++){
        $n = rand(0,count($this->items));
        array_push($this->eq, $this->items[$n]);
    }
}


public function setName($value) : void
{# To jest moja funkcja
    //if(strlen($value)>= 3 && strlen($value)<=16){
        var_dump($this->filterName($value));
        $this->name = substr($value, 0, 16);
  
    
    
}
private function filterName($value)
{
    $block = ['tęczowy','dupa','pis'];
    $ok = true;
    foreach ($block as $index => $word) {
        (stristr($value, $word)) ? $ok = false: null;
        #var_dump($index);
        #var_dump($ok);
    }
    
       return $ok;

    
}
public function getName() : string
{# To jest moja funkcja
 
    return $this->name;
}
private function addPoints(int $value) : void
{
    
    $this->points += $value;
    var_dump($this->points);
    
}
public function addBonus(int $value, int $bonus = 0) : void
{   
    $value+=$bonus;
    $this->addPoints($value);
    var_dump($this->points);
    
}

}
$p1 = new Player("gulgulglut");

echo $p1->getName();
$p1->addBonus(4, 1);
$p1->addBonus(4);
$p1->getItems();
for($j=0; $j<count($p1->eq); $j++){
    echo $p1->eq[$j].'<br>';
}
#$p1->points = '999999';
#echo $p1->points;
/*
$tab1 = [5,10,15];
$tab2 = array('a','b','c');
var_dump($tab1);
var_dump($tab2);
$tab3 = array(
    'a'=>'one',
    'b'=>'two',
    'c'=>'three',
);
$tab4 = [
    'a'=>'one',
    'b'=>'two',
    'c'=>'three',
];
$tab1[3] = 32;
$tab3['d'] = 'For';
var_dump($tab1);
var_dump($tab3);

var_dump($tab2[3]);
var_dump($tab4['d']);
echo count($tab2);
echo count($tab4);*/
?>
