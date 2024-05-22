<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/edit.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Úprava inzerátu</title>
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
    <?php
            require_once "db.php";
            if(isset($_GET['id'])) {
                $inzerat = null;
                $id = $_GET['id'];
                $sql = "SELECT * FROM autobazar_inzeraty WHERE id = $id";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    $inzerat = $result->fetch_assoc();
                }

                if(isset($_POST['upravit'])) {
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

                        $sql = "UPDATE autobazar_inzeraty SET nazev = '$nazev', obrazek = '$obrazek', cena = '$cena', znacka = '$znacka', model = '$model', rok = '$rok', motor = '$motor', palivo = '$palivo', prevodovka = '$prevodovka', najezd = '$najeto', popis = '$popis' WHERE id = $id";
                        $con->query($sql);
                        $con->close();
                    }
                        header("location: index.php");
                        die();
                }
            }
    ?>
    <form method="post">
        <label for="nazev" >Název inzerátu:</label>
        <input type="text" id="nazev" name="nazev" value="<?php echo $inzerat['nazev']; ?>"><br>

        <label for="obrazek" >Odkaz obrázku:</label>
        <input type="text" id="obrazek" name="obrazek" value="<?php echo $inzerat['obrazek']; ?>"><br>

        <label for="cena" >Cena:</label>
        <input type="text" id="cena" name="cena" value="<?php echo $inzerat['cena']; ?>"><br>

        <label for="znacka" >Značka auta:</label>
        <input type="text" id="znacka" name="znacka" value="<?php echo $inzerat['znacka']; ?>"><br>

        <label for="model">Model auta:</label>
        <input type="text" id="model" name="model" value="<?php echo $inzerat['model']; ?>"><br>

        <label for="rok_vyroby">Rok výroby:</label>
        <input type="text" id="rok" name="rok" value="<?php echo $inzerat['rok']; ?>"><br>

        <label for="motor">Motor:</label>
        <input id="motor" name="motor"value="<?php echo $inzerat['motor']; ?>"><br>

        <label for="palivo">Palivo:</label>
        <input id="palivo" name="palivo" value="<?php echo $inzerat['palivo']; ?>"><br>

        <label for="prevodovka">Převodovka:</label>
        <input id="prevodovka" name="prevodovka" value="<?php echo $inzerat['prevodovka']; ?>"><br>

        <label for="najeto">Najeto:</label>
        <input id="najeto" name="najeto" value="<?php echo $inzerat['najezd']; ?>"><br>

        <label for="popis">Popis:</label>
        <input id="popis" name="popis" value="<?php echo $inzerat['popis']; ?>"><br>

        <button name="upravit" type="submit" id="upravitBut">Upravit</button>
    </form>
</body>
</html>