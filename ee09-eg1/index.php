<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasz sklep komputerowy</title>
    <link rel="stylesheet" href="styl8.css">
</head>
<body>
    <header> 
<div class="menu">
<nav>
    <a href="index.php" class="a1">Główna</a>
    <a href="procesory.html" class="a1">Procesory</a>
    <a href="ram.html" class="a1">RAM</a>
    <a href="grafika.html" class="a1">Grafika</a>
</nav>
</div>
<div class="logo">
   <h2>Podzespoły komputerowe</h2>
</div>
</header>

<main>

<div class="main">
<h1>Dzisiejsze promocje</h1>

<div class="tab2">
<?php
skrpyt1();
?>

</div>
</div>


</main>

<fotter>

    <div class="pierwszy">
        <img src="scalak.png" alt="promocje na procesory">
</div>

<div class="drugi">
    <h4>Nasz Sklep Komputerowy</h4>
    <a>Współpracujemy z hurtownią <a href="http://wwww.edata.pl/" class="edata">  edata</a></a>
</div>

<div class="trzeci">
    <br>
    <a class="a2">zadzwoń: 601 602 603</a>
</div>

<div class="czwarty">
    <br>
    <a class="a3">Stronę wykonał: 1234567890</a>
</div>

</fotter>

<?php

function skrpyt1()
{

$conn = new mysqli("localhost","root","","sklep");

if($conn->connect_error)
{
     echo ("error: " . $conn->connect_error);
}

$sql = "SELECT id,nazwa,opis,cena FROM podzespoly WHERE cena<1000";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
    echo '<table class="tab1" border="2" cellspacing="0" cellpadding="0">';
    echo'<tr>';
    echo '<td class="td1">' . "NUMER" . '</td>';
    echo '<td class="td1">' . "NAZWA PODZESPOŁU" . '</td>';
    echo '<td class="td1">' . "OPIS" . '</td>';
    echo '<td class="td2">' . "CENA" . '</td>';
    echo '</tr>';
    
while($row = $result->fetch_assoc())
{
    echo'<tr>';
    echo '<td>' . $row["id"] . '</td>';
    echo '<td>' . $row["nazwa"] . '</td>';
    echo '<td>' . $row["opis"] . '</td>';
    echo '<td class="td3">' . $row["cena"] . '</td>';
    echo '</tr>';
}

echo '</table>';

}

}

?>





</body>
</html>