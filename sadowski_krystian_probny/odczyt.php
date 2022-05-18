
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        
    
<?php
    $conn = mysqli_connect('localhost', 'root', 'Student123!', 'dane_sadowski');
    // var_dump($conn);
    $query = mysqli_query($conn, "SELECT `name`,`desc`,`limitTime1`, COUNT(question.docId) FROM `documents` JOIN question on question.docId = documents.id GROUP BY documents.id");
    $html = '';
    while ($result = mysqli_fetch_array($query)) {
        $html .= "<p>Nazwa: ".$result['name']." Opis: ".$result['desc']." Czas na odp: ".$result['limitTime1']." Ilość pytań: ".$result['COUNT(question.docId)']."</p>";
    }
    echo $html;
    mysqli_close($conn);

    ?>
    <form action="odczyt.php" method="post">
        <label >Quiz nr.: </label><input type="number" name="quiz" id="quiz"><br>
        <label >Imie: </label><input type="text" name="imie" id="imie"><br>
        <label >Nazwisko: </label><input type="text" name="nazwisko" id="nazwisko"><br>
        <label >klasa: </label><input type="number" name="klasa" id="klasa"><br>
        <label >grupa: </label><input type="number" name="grupa" id="grupa">
        <button type="submit" name="submit">Submit</button>
    </form>
    <h2>Informacje na temat Quizu</h2>
    <table>

    <tr>
        <td>id</td><td>docId</td><td>typeId</td><td>pub</td><td>lockd</td><td>letMod</td><td>limitAnsw</td><td>quName</td>
    </tr>
    <?php
    $quiz_nr = isset($_POST['quiz']) ? $_POST['quiz'] : null;
    $imie = isset($_POST['imie']) ? $_POST['imie'] : null;
    $klasa = isset($_POST['klasa']) ? $_POST['klasa'] : null;
    $grupa = isset($_POST['grupa']) ? $_POST['grupa'] : null;
    $nazwisko = isset($_POST['nazwisko']) ? $_POST['nazwisko'] : null;
    if($quiz_nr != null || $nazwisko != null || $imie != null){
        $conn = mysqli_connect('localhost', 'root', 'Student123!', 'dane_sadowski');
        $query2 = mysqli_query($conn, "SELECT * FROM `question` WHERE `id` = $quiz_nr");
        $result2 = mysqli_fetch_array($query2);
        // var_dump($result2);
        $html2 = "<tr><th>".$result2['id']."</th><th>".$result2['docId']."</th><th>".$result2['typeId']."</th><th>".$result2['pub']."</th><th>".$result2['lockd']."</th><th>".$result2['letMod']."</th><th>".$result2['limitAnsw']."</th><th>".$result2['quName']."</th></tr>";
        echo $html2;
        $query2 = mysqli_query($conn, "INSERT INTO `students`(`class`,`group`,`name`, `surname`) VALUES ($klasa,$grupa,'$imie','$nazwisko')");
        
        mysqli_close($conn);
    }
        
    ?>
    </table>
</body>
    </html>
    