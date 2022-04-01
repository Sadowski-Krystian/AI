<?php
echo formGenerator();
function formGenerator(){
    $dir = dirname(__FILE__).'/../etc';
    $lst = scandir($dir);
    $form = '';
    $form .= '<form method="POST" action="index.php" id="mail">';
    $form .= '<label>Od: </label><select name="nadawca" id="nadawca" form="mail" required>';
    foreach ($lst as $node) {
        
        if (strpos($node, 'mx') !== false) {
            $opt = '<option value="'.$node.'">'.$node.'</option>';
            $form .= $opt;
        }
    }
    $form .= '</select><br>';
    $form .= '<label>Do: </label><input name="adresat" type="email" required/><br>';
    $form .= '<label>Temat: </label><input name="temat" type="text" required/><br>';
    $form .= '<label>Treść: </label><br><input name="tresc" type="text" required/><br>';
    $form .= '<button type="submit" name="sendBtn">Send</button><br>';
    $form .= '</form>';
    return $form;
}
?>