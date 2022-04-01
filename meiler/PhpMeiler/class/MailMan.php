<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require dirname(__FILE__).'/../lib/phpMailer/Exception.php';
require dirname(__FILE__).'/../lib/phpMailer/PHPMailer.php';
require dirname(__FILE__).'/../lib/phpMailer/SMTP.php';
class MailMan
{
	private $dbc;	// jeżeli będziesz pobierać dane z Bazy danych
	private $msg;	// jeżeli chcesz przechowywać komunikaty
	private $svw;	// jeżeli chcesz obsługiwać szablony HTML
	private $mail;	// tutaj możesz przechowywać ustawienia konta pocztowego odczytane z pliku mx.*.php

	// główna część kodu klienta pocztowego
private function loadMailerConf($mxConf)
{	// loads config for email account (login, pass, Portss)
	$cnf = false;
	var_dump("ładowanie");
	if(is_string($mxConf) && $mxConf!='')
	{	// if its String of the email account file config
		$mxCnf = dirname(__FILE__).'/../etc/'.$mxConf;
		if(file_exists($mxCnf))
		{	// Create a new PHPMailer instance
			$this->mail = new PHPMailer(true);
			var_dump("inicjacja");
			$this->mail->isSMTP();			// Tell PHPMailer to use SMTP
			//Enable SMTP debugging			// 0 = off (for production use)
			$this->mail->SMTPDebug = 2;		// 1 = client messages	// 2 = client and server messages
			$this->mail->Debugoutput = 'html';	//Ask for HTML-friendly debug output
			require($mxCnf);			// file exists - so include it
		} else { 
            echo "Wybrany nadawca nie istnieje";
        }
	} else {
        echo "brak podanego pliku";
     }
	return $cnf;
}

public function sendMail($nadawca, $adresat, $temat, $tresc, $file)
{	// 
	// String $mxConf;		// nazwa pliku konfiguracji wysyłki
	// String $mxSchema;	// nazwa pliku schematu/szablonu jak wysyłać i z czym
	// Array  $mxContent;	// treść wiadomości (Recipient[mail,name,surname]+Title+MailBody) 
	$this->loadMailerConf($nadawca);
	// do opracowania używając metod:
	$this->mail->addAddress( $adresat, 'wywalone' );
	$this->mail->CharSet = "utf-8";
	$this->mail->Subject = $temat;	//Set the subject line
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//$this->mail->msgHTML($mxBody);	//convert HTML into a basic plain-text alternative body
	//Replace the plain text body with one created manually
	//$this->mail->AltBody = $tresc;
	$this->mail->Body = $tresc;
	//Attach an image file
	if($file['tmp_name']!=''){
		var_dump("jest załącznik");
		$this->mail->addAttachment($file['tmp_name'], $file['name']);
	}
	
	//send the message, check for errors
	if (!$this->mail->send()){
		echo "wystapił błąd podczas wysyłania";
	}else{
		$this->setMailStatus($adresat);
	}
	// ?? return ??
}

private function setMailStatus($adresat){ 
	echo "Meil został wysłany do ".$adresat;
 }

}
?>