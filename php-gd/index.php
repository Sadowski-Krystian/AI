<?php
   
   echo generateForm();

   function generateForm(){
    $form = "";
    $content = "";
    $content .= "<label>Tekst na obrazek</label></br>";
    $content .= "<input name='tekst' type='textarea'></br>";
    $content .= "<label>Wybierz obrazek</label></br>";
    $content .= "<input name='file' type='file'></br>";
    $content .= "<button type='submit' name='setBtn'>Generuj</button></br>";
    $form .= "<form action='generate.php' method='POST' enctype='multipart/form-data'>".$content."</form>";
    return $form;
   }
?>