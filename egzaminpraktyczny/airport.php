<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl6.css">
    <title>Odloty Samolotów</title>
</head>
<body>
    <header>
        <div class="banerleft">
            <h2>Odloty z lotniska</h2>
        </div>
        <div class="banerright">
            <img src="zad6.png" alt="logotyp">
        </div>
    </header>
    <main>
        <h4>Tabela odlotów</h4>
        <table>
            <tr>
                <td>lp.</td><td>numer rejsu</td><td>czas</td><td>kierunek</td><td>status</td>
            </tr>
            <?php
                $conn = mysqli_connect("localhost", "root", "Student123!", "egzamin6");
                $query = mysqli_query($conn, "SELECT `id`,`nr_rejsu`,`czas`,`kierunek`,`status_lotu` FROM `odloty` ORDER BY `czas` DESC");
                $html ="";
                while ($result = mysqli_fetch_array($query)) {
                    $html .= "<tr><th>".$result['id']."</th><th>".$result['nr_rejsu']."</th><th>".$result['czas']."</th><th>".$result['kierunek']."</th><th>".$result['status_lotu']."</th></tr>";
                }
                echo $html;
            ?>
        </table>
    </main>
    <footer>
        <div class="footer1">
            <a href="kwerendy.txt">Pobierz Obraz</a>
        </div>
        <div class="footer2">
            <?php
                if ($_COOKIE['again']) {
                    echo "<p>Miło nam, że nas znowu odwiedziłeś.</p>";
                }else{
                    echo "<p>Dzień dobry! Sprawdź regulamin naszej strony</p>";
                }
                setcookie("again", "ponownie", time() + 3600)
                
            ?>
        </div>
        <div class="footer3">
            Autor: 2137
        </div>
    </footer>
</body>
</html>