<style>
    table, tr, td{
        border: solid 3px black
    }
</style>
<table>

<?php
error_reporting(E_ERROR | E_PARSE);
$debug = FALSE;
$uc = [];
$ok = [];
$nu = [];
$ui = [];
$ub = [];
$no;
$cos;
for($i = 0; $i<50; $i++){
    echo '<tr ><td ></td >';
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
        $random = los();
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
        if($debug == TRUE){
            echo '<td >'.$cos.': ',$random.'</td>';
        }else{
            echo '<td >'.$cos.'</td>';
        }
        
        $no=$no+50;
        
        
    }
    
    echo '</tr>';
}


function los(){
    $tab = ['uc', 'ok', 'nu','ui', 'ub'];
    $number = rand(0,4);
    return $tab[$number];
}
$s;
function addTd($count, $name, $sum){
    
    for($i = 0; $i<$count; $i++){
        $sum[$i] = $sum[$i]+$name[$i];
        echo '<td>'.$name[$i].'</td>';
       
        
    }
    return $sum;
}



?>

    <tr>
        <td>Wykreślone</td><?php $s = addTd(20, $ub, $s); ?><td>Ogółem</td>
    </tr>
    <tr>
        <td>u czytelnika</td><?php $s = addTd(20, $uc, $s); ?><td></td>
    </tr>
    <tr>
        <td>w bibliotece</td><?php $s = addTd(20, $nu, $s); ?><td></td>
    </tr>
    <tr>
        <td>u introligatora</td><?php $s = addTd(20, $ui, $s); ?><td></td>
    </tr>
    <tr>
        <td>na pólkach</td><?php $s = addTd(20, $ok, $s); ?><td></td>
    </tr>
    <tr>
        <td>Brak</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>
    <tr>
        <td>Razem</td><?php sumDisplay($s); ?><td>1000</td>
    </tr>
</table>
<?php



function sumDisplay($cos){
    for($i=0; $i<sizeof($cos); $i++){
        echo '<td>'.$cos[$i].'</td>';
    }
}

?>