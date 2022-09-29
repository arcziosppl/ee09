<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    

<header>
    <div class="baner">
        <h3>Portal społecznościowy - panel administratora</h3>
</div>
</header>

<main>
    <div class="lewy">
        <h4>Użytkownicy</h4>
        <?php
        skrypt1();
        ?>

        <a href="settings.html">Inne ustawienia</a>
</div>

<div class="prawy">
    <h4>Podaj id Użytkownika</h4>

    <form method="post" action="users.php">
        <input type="number" name="num">
        <input type="submit" name="btn1" value="ZOBACZ" class="btn">
</form>
<hr>
<?php
if(isset($_POST["btn1"]))
{
skrypt2();
}
?>

</div>
</main>

<footer>
    <div class="stopka">
Stronę wykonał: 12345678990
</div>
</footer>



<?php

function skrypt1(){

    $conn = new mysqli("localhost","root","","dane4");

    if($conn->connect_error){
        die("Error: " . $conn->connect_error);
    }

    $sql = "SELECT id,imie,nazwisko,rok_urodzenia FROM osoby WHERE id<=31";
    $sql2 = "SELECT id,imie,nazwisko,rok_urodzenia FROM osoby WHERE id<=31";
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);


    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){

            $obl_wiek = $row["rok_urodzenia"];
            echo $row["id"] . ". " . $row["imie"]  . " " . $row["nazwisko"] . ", " . 
            $data = date("Y") - $row["rok_urodzenia"];
            ;
            echo '<br>'; 
        }
    }

    $conn->close();


}

function skrypt2(){

 $conn = new mysqli("localhost","root","","dane4");
 
 $obraz = $_POST["num"];
 

    if($conn->connect_error){
        die("Error: " . $conn->connect_error);
    }

    $sql = "SELECT id,imie,nazwisko,rok_urodzenia,opis,zdjecie FROM osoby WHERE id=('$obraz')";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo '<B>' . $row["id"] . ". " . $row["imie"] . " " . $row["nazwisko"] . '</B>';
            echo '<br>';
            echo "Rok urodzenia: "  . $row["rok_urodzenia"];
            echo '<br>';
            echo "Opis: "  . $row["opis"];
            echo '<br>';
            echo "Hobby: "  . $row["opis"];

          
        }
    }

    $conn->close();

}






?>

</body>
</html>