<?php
$nowDt = date('Y-m-d H:i:s');
$nowUTS = strtotime($nowDt);
$data = (isset($_POST['date'])) ? $_POST['date'] : $nowDt;
$uts = (isset($_POST['uts'])) ? $_POST['uts'] : $nowUTS;
if(isset($_POST['submit'])){
    $uts = strtotime($data);
}
print("data i czas");
echo '<form>';
echo '<button type="submit" name="submit">OK</button>';
echo "<p>Data</p>";
echo '<input type ="text" name="date"  value="'.$data.'">';
echo "<p>Unix Timestamp</p>";
echo '<input type ="text" name="uts"  value="'.$uts.'">';
