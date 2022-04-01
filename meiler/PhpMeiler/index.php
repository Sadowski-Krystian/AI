<?php
include('./vievs/mailForm.php');

if(isset($_POST['sendBtn'])){
    $nadawca = isset($_POST['nadawca']) && strlen($_POST['nadawca']) >0 ? $_POST['nadawca'] : null;
    $adresat = isset($_POST['adresat']) && strlen($_POST['adresat']) >0 ? $_POST['adresat'] : null;
    $temat = isset($_POST['temat']) && strlen($_POST['temat']) >0 ? $_POST['temat'] : null;
    $tresc = isset($_POST['tresc']) && strlen($_POST['tresc']) >0 ? $_POST['tresc'] : null;
    $attachment = isset($_FILES['file']) ? $_FILES['file'] : null;
    var_dump($nadawca, $adresat, $temat, $tresc, $attachment['tmp_name']);

    require_once(dirname(__FILE__).'/class/MailMan.php');
    
    $mx = new MailMan;
    
    if( !empty($mx) )
    {	// jest biblioteka poczty e-mail - wysyłka możliwa
        var_dump('inicjacja klasy');
        $snd = $mx->sendMail($nadawca, $adresat, $temat, $tresc, $attachment);
    }
}

?>