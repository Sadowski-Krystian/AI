<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Zaproszenie na Event</h1>
    <p>Akapit testowy - opis eventu: <?php echo $args['event'];?></p>
    <p>Witaj <?php echo $args['imie'];?> <?php echo $args['nazwisko'];?> zaproszony <?php echo $args['data'];?> do <?php echo $args['miejsce'];?></p>
</body>
</html>