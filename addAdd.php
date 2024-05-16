<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="styleIndex.css">
    <link rel="stylesheet" href="styleIndexInzerat.css">
    <title>Přidání inzerátu</title>
</head>
<body>
    <?php
        session_start();
        var_dump($_SESSION);
        if ($_SESSION["jePrihlasen"]) {
            header("location: index.php");
            die();
        }
    ?>

    <nav class="navBar">
        <div class="navDiv">
            <div class="">
                <div class="divLogo"><a href="index.php"><img src="img\logo.png" alt="Logo" style="height: 100px;"></a></div>
                <div class="divBut">
                    <?php
                        if (isset($_SESSION["jePrihlasen"])) {
                            if($_SESSION["jePrihlasen"] == true){
                                echo '
                                    <button class="addBut"><a href="addAdd.php">Přidat Inzerát</a></button>
                                ';
                            }   
                        } 
                    ?>
                </div>
            </div>
            
            <ul>
                <li><a href="index.php">Domů</a></li>
                <li><a href="info.php">O nás</a></li>
                <li><a href="contact.php">Kontakt</a></li>
                <?php
                    if (isset($_SESSION["jePrihlasen"])) {
                        if($_SESSION["jePrihlasen"] == false){
                            echo '
                                <button class="navBut"><a href="login.php">Přihlásit</a></button>
                                <button class="navBut"><a href="registration.php">Registrovat</a></button>
                            ';
                        } else {
                            echo'
                                <button class="profileBut"><a href="profile.php">Profil</a></button>
                            ';
                        }
                    } else {
                        echo '
                                <button class="navBut"><a href="login.php">Přihlásit</a></button>
                                <button class="navBut"><a href="registration.php">Registrovat</a></button>
                            ';
                    }
                ?>
                
            </ul>
        </div>
    </nav>

    <h2>Přidat inzerát auta</h1>
    <form method="post">
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

        <button name="pridat" type="submit">Přidat inzerát</button>
    </form>

    <?php
        if(isset($_POST["pridat"])){
            require_once "db.php";

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