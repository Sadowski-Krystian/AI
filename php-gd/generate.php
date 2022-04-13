<?php
$setBtn = isset($_POST['setBtn']) ? $_POST['setBtn'] : null;
$usrFile = isset($_FILES['file']) ? $_FILES['file'] : null;
$text = isset($_POST['tekst']) ? $_POST['tekst'] : null;
define('COLOR', [0, 0, 0]);
define('FONT_SIZE', 28);
define('FONT_FAMILY', 'Lato-Regular.ttf');
define('MARGIN', 20);
if($setBtn !== null){
    // var_dump($text);
   generateImg($usrFile['tmp_name'],$text);
}


function generateImg($uploadedImage, $caption){
  $image = imagecreatefrompng($uploadedImage);
  if ($image) {
      $imageHeight = getimagesize($uploadedImage)[1];
      $imageHeight -= MARGIN;
      $color = imagecolorallocate($image, ...COLOR);
      $font = implode(DIRECTORY_SEPARATOR, ['./assets/', FONT_FAMILY]);
      imagettftext($image, FONT_SIZE, 0, MARGIN, $imageHeight, $color, $font, $caption);
      header('Content-Type: image/jpeg');
      imagejpeg($image);
      imagedestroy($image);
  }
}
?>