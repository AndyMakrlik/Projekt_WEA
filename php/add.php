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
        //var_dump($_SESSION);
        include 'nav.php';
        if (isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == false) {
            header("location: index.php");
            die();
        }
    ?>

    <h1>Přidat inzerát auta</h1>
    <form id="inzeratInfo" method="post" id="formular">
        <label for="nazev" >Název inzerátu:</label>
        <input type="text" id="nazev" name="nazev" required><br>

        <label for="obrazek" >Odkaz obrázku:</label>
        <input type="url" id="obrazek" name="obrazek" required><br>

        <label for="cena" >Cena:</label>
        <input type="number" id="cena" name="cena" required min="0"><br>

        <label for="znacka" >Značka auta:</label>
        <input type="text" id="znacka" name="znacka" required><br>

        <label for="model">Model auta:</label>
        <input type="text" id="model" name="model" required><br>

        <label for="rok_vyroby">Rok výroby:</label>
        <input type="number" id="rok" name="rok" required min="0" max="2024"><br>

        <label for="motor">Motor/Výkon:</label>
        <input type="text" id="motor" name="motor" required><br>

        <label for="palivo">Palivo:</label>
        <input type="text" id="palivo" name="palivo" required><br>

        <label for="prevodovka">Převodovka:</label>
        <input type="text" id="prevodovka" name="prevodovka" required><br>

        <label for="najeto">Najeto:</label>
        <input type="number" id="najeto" name="najeto" required min="0"><br>

        <label for="popis">Popis:</label>
        <textarea id="popis" name="popis" rows="5" required></textarea><br>

        <button id="pridatInzerat" name="pridat" type="submit" id="pridatBut">Přidat inzerát</button>
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
                $_SESSION["add"] = true;
            }

            header("location: index.php");
            die();
        }
    ?>
</body>
</html>