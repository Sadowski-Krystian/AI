<style>
    table, tr, td{
        border: solid 3px black
    }
</style>
<table>

<?php

$uc = [];
$ok = [];
$nu = [];
$ui = [];
$ub = [];
$no;
$cos;
for($i = 0; $i<50; $i++){
    echo '<tr >';
    $no= $i+1;
    for($j = 0; $j<20; $j++){
        $cos = $no;
        
        if($no<100){
            if($no <10){
                $cos = '00'.$no;
            }else{
                $cos = '0'.$no;
            }
            
        }
        if($random == 'uc'){
            $uc[$j]+=1;
        }else if($random == 'ok'){
            $ok[$j]+=1;
        }else if($random == 'ui'){
            $ui[$j]+=1;
        }else if($random == 'nu'){
            $nu[$j]+=1;
        }else if($random == 'ub'){
            $ub[$j]+=1;
        }
        $random = los();
        echo '<td >'.$cos.': ',$random.'</td>';
        $no=$no+50;
        
        
    }
    
    echo '</tr>';
}
var_dump($uc);
var_dump($ok);
var_dump($ui);
var_dump($nu);
var_dump($ub);

function los(){
    $tab = ['uc', 'ok', 'nu','ui', 'ub'];
    $number = rand(0,4);
    return $tab[$number];
}
$sum = [];
function addTd($count, $name){
    
    for($i = 0; $i<$count; $i++){
        echo '<td>'.$name[$i].'</td>';
        $sum[$i] =  $name[$i]+$sum[$i];
        
    }
    
    
}
for($i = 0; $i<20; $i++){
    var_dump($sum[$i]);
}
?>
</table>

<table>
    <tr>
        <td>Wykreślone</td><?php addTd(20, $ub); ?><td>Ogółem</td>
    </tr>
    <tr>
        <td>u czytelnika</td><?php addTd(20, $uc); ?><td></td>
    </tr>
    <tr>
        <td>w bibliotece</td><?php addTd(20, $nu); ?><td></td>
    </tr>
    <tr>
        <td>u introligatora</td><?php addTd(20, $ui); ?><td></td>
    </tr>
    <tr>
        <td>na pólkach</td><?php addTd(20, $ok); ?><td></td>
    </tr>
    <tr>
        <td>Brak</td><?php addTd(20, null); ?><td></td>
    </tr>
    <tr>
        <td>Razem</td><?php addTd(20, $sum); ?><td>100</td>
    </tr>
</table>