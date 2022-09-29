<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title>Port lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <div class="baner">
            <div class="pierwszy">
                <img src="zad5.png">
</div>

<div class="drugi">
    <h1>Przyloty</h1>
</div>

<div class="trzeci">
    <h3>Prydatne linki</h3>
    <a href="kwerendy.txt">Pobierz</a>
</div>

</div>
</header>

<main>
    <div class="glowny">
        <?php
        skrypt1();
        ?>
    </div>

</main>

<footer>
<div class="f_pierwszy">
    <p><?php

setcookie("cookie","Witaj ponownie na stronie lotniska",time()+7200); //tworzymy cookie o nazwie cookie i wartości witaj ponownie... o czasie twania 2h

if(isset($_COOKIE["cookie"])) //sprawdzamy czy cookie wystepuje jak tak to go wypisujemy a jak nie to Dzień dobry!Strona lotniska używa ciasteczek
{
    echo $_COOKIE["cookie"];
}
else
{
echo "Dzień dobry!Strona lotniska używa ciasteczek";
}

    ?></p> 
    </div>

<div class="f_drugi">
    Autor: 1234567890
</div>

</footer>

<?php

function skrypt1(){

$conn = new mysqli("localhost","root","","egzamin"); //usatnawiamy poł z baza danych sprawdzamy jego poprawność  a następnie wykonujemy zapytanie i wyświetlamy dane za pomocą tabeli

if($conn->connect_error)
{
    echo "ERROR: " . $conn->connect_error;
}

$sql="SELECT id,czas,kierunek,nr_rejsu,status_lotu FROM przyloty";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
    echo '<table collspan=0 border=1>';
    echo'<tr>';
    echo '<td>' . "CZAS" . '</td>';
    echo '<td>' . "KIERUNEK" . '</td>';
    echo '<td>' . "NUMER REJSU" . '</td>';
    echo '<td>' . "STATUS" . '</td>';
    echo '</tr>';
    while($row = $result->fetch_assoc())
    {
        echo'<tr>';
        echo '<td>' . $row["czas"] . '</td>';
        echo '<td>' . $row["kierunek"] . '</td>';
        echo '<td>' . $row["nr_rejsu"] . '</td>';
        echo '<td>' . $row["status_lotu"] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
}

$conn->close();


}
?>

</body>
</html>