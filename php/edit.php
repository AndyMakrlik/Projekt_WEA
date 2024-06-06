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
        //var_dump($_SESSION);
        include 'nav.php';
        if (isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == false) {
            header("location: index.php");
            die();
        }
        
        if (isset($_GET['id'])) {
            require_once "db.php";
            $inzerat = null;
            $id = $_GET['id'];
            $sql = "SELECT * FROM autobazar_inzeraty WHERE id = $id";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                $inzerat = $result->fetch_assoc();
                if ($_SESSION["id_uzivatele"] != $inzerat["fk_uzivatel"]) {
                    header("location: index.php");
                    $con->close();
                    die();
                }
            }

            if (isset($_POST['upravit'])) {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nazev = $_POST["nazev"];
                    $obrazek = $_POST["obrazek"];
                    $cena = $_POST["cena"];
                    $znacka = $_POST["znacka"];
                    $model = $_POST["model"];
                    $rok = $_POST["rok"];
                    $motor = $_POST["motor"];
                    $palivo = $_POST["palivo"];
                    $prevodovka = $_POST["prevodovka"];
                    $najeto = $_POST["najeto"];
                    $popis = $_POST["popis"];

                    $sql = "UPDATE autobazar_inzeraty SET nazev = '$nazev', obrazek = '$obrazek', cena = '$cena', znacka = '$znacka', model = '$model', rok = '$rok', motor = '$motor', palivo = '$palivo', prevodovka = '$prevodovka', najezd = '$najeto', popis = '$popis' WHERE id = $id";
                    $con->query($sql);
                    $con->close();
                    $_SESSION["edit"] = true;
                }
                header("location: index.php");
                die();
            }
        }
    ?>
    <h1>Upravit inzerát auta</h1>
    <form id="inzeratInfo" method="post">
        <label for="nazev">Název inzerátu:</label>
        <input type="text" id="nazev" name="nazev" value="<?php echo $inzerat['nazev']; ?>" required><br>

        <label for="obrazek">Odkaz obrázku:</label>
        <input type="url" id="obrazek" name="obrazek" value="<?php echo $inzerat['obrazek']; ?>" required><br>

        <label for="cena">Cena:</label>
        <input type="number" id="cena" name="cena" value="<?php echo $inzerat['cena']; ?>" required min="0"><br>

        <label for="znacka">Značka auta:</label>
        <input type="text" id="znacka" name="znacka" value="<?php echo $inzerat['znacka']; ?>" required><br>

        <label for="model">Model auta:</label>
        <input type="text" id="model" name="model" value="<?php echo $inzerat['model']; ?>" required><br>

        <label for="rok_vyroby">Rok výroby:</label>
        <input type="number" id="rok" name="rok" value="<?php echo $inzerat['rok']; ?>" required min="0" max="2024"><br>

        <label for="motor">Motor/Výkon :</label>
        <input type="text" id="motor" name="motor" value="<?php echo $inzerat['motor']; ?>" required><br>

        <label for="palivo">Palivo:</label>
        <input type="text" id="palivo" name="palivo" value="<?php echo $inzerat['palivo']; ?>" required><br>

        <label for="prevodovka">Převodovka:</label>
        <input type="text" id="prevodovka" name="prevodovka" value="<?php echo $inzerat['prevodovka']; ?>" required><br>

        <label for="najeto">Najeto:</label>
        <input type="number" id="najeto" name="najeto" value="<?php echo $inzerat['najezd']; ?>" required min="0"><br>

        <label for="popis">Popis:</label>
        <textarea rows="5" id="popis" name="popis" required><?php echo $inzerat['popis']; ?></textarea><br>

        <button name="upravit" type="submit" id="upravitBut">Upravit</button>
    </form>
</body>

</html>