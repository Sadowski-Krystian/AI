<?php
$setBtn = isset($_POST['setBtn']) ? $_POST['setBtn'] : null;
$usrFile = isset($_FILES['file']) ? $_FILES['file'] : null;
if($setBtn !== null){
    
    $extension = substr($usrFile['name'] , strrpos($usrFile['name'] , '.') +1);
    if($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
        
       
    }else{
        
    }
}

generateImg();

function generateImg(){
     // Create an image with the specified dimensions
   // Create an image with the specified dimensions
   $image = imageCreate(600,300);
   $icon = imagecreatefrompng('logo.png');
   imagecopy($image, $icon, 100, 0, 0, 0, 250, 250);
   // Create a color (this first call to imageColorAllocate
   //  also automatically sets the image background color)

 
   // Set type of image and send the output
   header("Content-type: image/png");
   imagePng($image);
 
   // Release memory
   imageDestroy($image);
}
?>