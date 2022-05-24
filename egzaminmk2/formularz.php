<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>Budynek</td><td>nr. Sali</td><td>Piętro</td><td>mejsca</td><td>uwagi</td>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "Student123!", "inventaryzacja_sadowski");
        $query = mysqli_query($conn, "INSERT INTO `invSupplyReplace`(`confirm`, `emlSend`, `replaced`, `user`, `device`, `supply`, `dateAdd`, `dateCnf`, `dateRpl`, `authCode`, `uwagi`) VALUES ($confirm,$meilconfirm,$wymiana,$clientid,$deviceid,$supplyid,'$adddate','$cnfdate','$repdate','$auth','$uwagi')");
    
    
        mysqli_close($conn);
        ?>
    </table>
    <form action="formularz.php" method="post" id="repform">
        <label for="confirm">Potwierdzenie zgłoszenia</label><input type="checkbox" name="confirm" id="confirm"><br>
        <label for="meilconfirm">Czy wysłano meila z potwierdzeniem?</label><input type="checkbox" name="meilconfirm" id="meilconfirm"><br>
        <label for="wymiana">Dokonano wymiany?</label><input type="checkbox" name="wymiana" id="wymiana"><br>
        <label for="clientid">ID Clienta</label><br><input type="number" name="clientid" id="clientid"><br>
        <label for="deviceid">ID Urządzenia</label><br><input type="number" name="deviceid" id="deviceid"><br>
        <label for="supplyid">ID Zasobu</label><br><input type="number" name="supplyid" id="supplyid"><br>
        <label for="adddate">Data złożenia reklamacji</label><br><input type="date" name="adddate" id="adddate"><br>
        <label for="cnfdate">Data potwierdzenia</label><br><input type="date" name="cnfdate" id="cnfdate"><br>
        <label for="repdate">Data wymiany</label><br><input type="date" name="repdate" id="repdate"><br>
        <label for="auth">Kod autoryzacyjny</label><br><input type="number" name="auth" id="auth"><br>
        <label for="uwagi">Uwagi</label><br><textarea name="uwagi" form="repform" id="uwagi"></textarea><br>
        <button type="submit" name="submit">Wyślij</button>
    </form>
    <?php
    $confirm = (isset($_POST['confirm'])) ? 1 : 0;
    $meilconfirm = (isset($_POST['meilconfirm'])) ? 1 : 0;
    $wymiana = (isset($_POST['wymiana'])) ? 1 : 0;
    $clientid = (isset($_POST['clientid'])) ? $_POST['clientid'] : null;
    $deviceid = (isset($_POST['deviceid'])) ? $_POST['deviceid'] : null;
    $supplyid = (isset($_POST['supplyid'])) ? $_POST['supplyid'] : null;
    $adddate = (isset($_POST['adddate'])) ? $_POST['adddate'] : null;
    $cnfdate = (isset($_POST['cnfdate'])) ? $_POST['cnfdate'] : null;
    $repdate = (isset($_POST['repdate'])) ? $_POST['repdate'] : null;
    $auth = (isset($_POST['auth'])) ? $_POST['auth'] : null;
    $uwagi = (isset($_POST['uwagi'])) ? $_POST['uwagi'] : null;
    if($clientid != null && $deviceid != null && $supplyid != null && $adddate != null && $cnfdate != null && $repdate != null && $auth != null && $uwagi != null){
        $conn = mysqli_connect("localhost", "root", "Student123!", "inventaryzacja_sadowski");
        $query = mysqli_query($conn, "INSERT INTO `invSupplyReplace`(`confirm`, `emlSend`, `replaced`, `user`, `device`, `supply`, `dateAdd`, `dateCnf`, `dateRpl`, `authCode`, `uwagi`) VALUES ($confirm,$meilconfirm,$wymiana,$clientid,$deviceid,$supplyid,'$adddate','$cnfdate','$repdate','$auth','$uwagi')");
    }
    
    mysqli_close($conn);
    ?>
</body>
</html>