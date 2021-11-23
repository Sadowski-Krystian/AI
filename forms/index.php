<?php
require_once('libCss.php');
require_once('interface.php');
require_once('form.php');
require_once('button.php');
$setBtn = isset($_POST['setBtn']) ? $_POST['setBtn'] : null;

$frm = new Form('POST', 'wbpage.php');
$frm->setId('abc');
$frm->addControls('<label> Pole 1 </label>');
$frm->addControls('<input/>');

$btnSbmt = new Button('setBtn', 'Wyslij', 'submit');
$frm->addControls($btnSbmt);
$form = $frm->display();


if($setBtn!==null)
    $form .= 'Przetwarzanie';
echo '<!DOCTYPE=html><html>';
echo '<head><meta charset="UTF-8"/><title>Test Form</title></head>';
echo '<body>'.$form.'</body></html>';


?>
