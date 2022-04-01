<?php
echo formGenerator();
function formGenerator(){
    $dir = dirname(__FILE__).'/../etc';
    $lst = scandir($dir);
    $form = '';
    $form .= '<form method="POST" action="index.php" id="mail" enctype="multipart/form-data">';
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
    $form .= '<label id="tresc">Treść: </label><br><textarea id="tresc" name="tresc" rows="8" cols="100" required></textarea><br>';
    $form .= '<label>Załącznik</label><input name="file" type="file"><br>';
    $form .= '<button type="submit" name="sendBtn">Send</button><br>';
    $form .= '</form>';
    return $form;
}
?>