<?php
include('./vievs/mailForm.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpMailer/Exception.php';
require './phpMailer/PHPMailer.php';
require './phpMailer/SMTP.php';
if(isset($_POST['sendBtn'])){
    $nadawca = isset($_POST['nadawca']) && strlen($_POST['nadawca']) >0 ? $_POST['nadawca'] : null;
    $adresat = isset($_POST['adresat']) && strlen($_POST['adresat']) >0 ? $_POST['adresat'] : null;
    $temat = isset($_POST['temat']) && strlen($_POST['temat']) >0 ? $_POST['temat'] : null;
    $tresc = isset($_POST['tresc']) && strlen($_POST['tresc']) >0 ? $_POST['tresc'] : null;
    var_dump($nadawca, $adresat, $temat, $tresc);


    
    date_default_timezone_set('Europe/Warsaw');
    
    $mail = new PHPMailer(true);
    try {
     $mail->isSMTP(); // Używamy SMTP
     $mail->Host = 'smtp.gmail.com'; // Adres serwera SMTP
     $mail->SMTPAuth = true; // Autoryzacja (do) SMTP
     $mail->Username = "krystek23s@gmail.com"; // Nazwa użytkownika
     $mail->Password = "******"; // Hasło
     $mail->SMTPSecure = 'tls'; // Typ szyfrowania (TLS/SSL)
     $mail->Port = 587; // Port
    
     $mail->CharSet = "UTF-8";
     $mail->setLanguage('pl', '/phpmailer/language');
    
     $mail->setFrom('krystek23s@gmail.com', 'Webinsider.pl');
     $mail->addAddress('krystek23s@gmail.com', 'Patryk');
    
     $mail->isHTML(true); // Format: HTML
     $mail->Subject = $temat;
     $mail->Body = $tresc;
     $mail->AltBody = 'By wyświetlić wiadomość należy skorzystać z czytnika obsługującego wiadomości w formie HTML';
    
     $mail->send();
     // Gdy OK:
     header("Location: https://webinsider.pl/?email=1");
    
    } catch (Exception $e) {
     // Gdy błąd:
     var_dump($e);
     //header("Location: https://webinsider.pl/?email=0");
    }
    
}

?>