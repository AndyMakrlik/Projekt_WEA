<?php
    session_start();
    if (!$_SESSION["jePrihlasen"]) {
        header("location: index.php");
        die();
    }

    require_once "db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nazev = $_POST["nazev"];
        $obrazek = $_POST["obrazek"];
        $znacka = $_POST["znacka"];
        $model = $_POST["model"];
        $rok = $_POST["rok"];
        $motor = $_POST["motor"];
        $palivo = $_POST["palivo"];
        $prevodovka = $_POST["prevodovka"];
        $najeto = $_POST["najeto"];
        $popis = $_POST["popis"];

        $sql = "INSERT INTO autobazar_inzeraty (id, nazev, obrazek, cena, znacka, model, rok, motor, palivo, prevodovka, najezd, popis) 
                VALUES (null, '$nazev', '$obrazek', '$znacka', '$model', '$rok', '$motor', '$palivo', '$prevodovka', '$najeto', '$popis')";
        $con->close();
    }

    header("location: index.php");
    die();
?>
