<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/add.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <title>Přidání inzerátu</title>
</head>
<body>
    <?php
        session_start();
        var_dump($_SESSION);
        include 'nav.php';
        if (isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == false) {
            header("location: index.php");
            die();
        }
    ?>

    <h2>Přidat inzerát auta</h1>
    <form method="post" id="formular">
        <label for="nazev" >Název inzerátu:</label>
        <input type="text" id="nazev" name="nazev" ><br>

        <label for="obrazek" >Odkaz obrázku:</label>
        <input type="text" id="obrazek" name="obrazek" ><br>

        <label for="cena" >Cena:</label>
        <input type="text" id="cena" name="cena" ><br>

        <label for="znacka" >Značka auta:</label>
        <input type="text" id="znacka" name="znacka" ><br>

        <label for="model">Model auta:</label>
        <input type="text" id="model" name="model" ><br>

        <label for="rok_vyroby">Rok výroby:</label>
        <input type="text" id="rok" name="rok" ><br>

        <label for="motor">Motor:</label>
        <input id="motor" name="motor"></input><br>

        <label for="palivo">Palivo:</label>
        <input id="palivo" name="palivo"></input><br>

        <label for="prevodovka">Převodovka:</label>
        <input id="prevodovka" name="prevodovka"></input><br>

        <label for="najeto">Najeto:</label>
        <input id="najeto" name="najeto"></input><br>

        <label for="popis">Popis:</label>
        <input id="popis" name="popis"></input><br>

        <button name="pridat" type="submit" id="pridatBut">Přidat inzerát</button>
    </form>

    <?php
        if(isset($_POST["pridat"])){
            require_once "db.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nazev = $_POST["nazev"];
                $obrazek = $_POST["obrazek"];
                $cena = preg_replace('/[^0-9]/', '', $_POST["cena"]);
                $znacka = $_POST["znacka"];
                $model = $_POST["model"];
                $rok = preg_replace('/[^0-9]/', '', $_POST["rok"]);
                $motor = $_POST["motor"];
                $palivo = $_POST["palivo"];
                $prevodovka = $_POST["prevodovka"];
                $najeto = preg_replace('/[^0-9]/', '', $_POST["najeto"]);
                $popis = $_POST["popis"];

                $sql = "INSERT INTO autobazar_inzeraty (nazev, obrazek, cena, znacka, model, rok, motor, palivo, prevodovka, najezd, popis) VALUES ('$nazev', '$obrazek', '$cena', '$znacka', '$model', '$rok', '$motor', '$palivo', '$prevodovka', '$najeto', '$popis')";
                $con->query($sql);
                $con->close();
            }

            header("location: index.php");
            die();
        }
    ?>
</body>
</html>