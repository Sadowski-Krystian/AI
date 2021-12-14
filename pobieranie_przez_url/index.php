<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="form.php" method='POST'>
        <Label>Link</Label><input type="url" name="url" required><br>
        <Label>Nazwa Pliku</Label><input type="text" name="name" value="cos.html"><br>
        <Label>Ścieżka zapisu</Label><input type="text" name="dir" value="/home/k3pt4"><br>

        <button type="submit">Pobierz</button>
    </form>
    
    
</body>
</html>

<?php
function getLink(){
    
}



?>