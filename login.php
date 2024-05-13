<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleIndex.css">
    <script src="https://kit.fontawesome.com/b9aa334442.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Přihlášení</title>
</head>
<body>
    <?php
        session_start();

        var_dump($_SESSION);
        var_dump($_POST);
        $chyby = "";
        
        if (isset($_POST["prihlaseni"])) {
            if (strlen($_POST["prezdivka"]) < 5) {
                $chyby .= "Přezdívka by měla být delší než 5 znaků! \n";
            }

            if (strlen($_POST["heslo"]) < 8) {
                $chyby .= "Heslo by mělo být delší než 8 znaků! \n";
            }

            if (empty($errors)) {
                require_once "db.php";
                $prezdivka = $_POST["prezdivka"];
                $sql = "SELECT * FROM autobazar WHERE prezdivka = '$prezdivka';";
                $vysledek = $con->query($sql);
                if ($vysledek->num_rows == 1) {
                    print_r($vysledek);
                    $uzivatel = $vysledek->fetch_object();
                    $heslo = $_POST["heslo"];
                    $zasifrovaneHeslo = $uzivatel->heslo;
                    
                    if (password_verify($heslo, $zasifrovaneHeslo)) {
                        $_SESSION["jePrihlasen"] = true;
                        echo ("úspěch");
                        $_SESSION["prezdivka"] = $_POST["prezdivka"];
                        header("location: profile.php");
                        die();
                    } else {
                        echo "Špatné heslo!!!";
                    }
                }
            }
        }
    ?>
    
    <nav class="navBar">
        <div class="navDiv">
            <div class="">
                <div class="divLogo"><img src="img\logo.png" alt="Logo" style="height: 100px;"></div>
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
    


    <div class="div">
            <div class="formular">
                <h1>Přihlášení</h1>
                <form action="login.php" method="post">
                    <div class="vstupy">
                        <div class="vstupniPole">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" placeholder="Přezdívka" name="prezdivka">
                        </div>
                        <div class="vstupniPole">
                            <i class="fa-solid fa-key"></i>
                            <input type="password" placeholder="Heslo" name="heslo">
                        </div>
                        <div>
                            <input type="submit" value="Příhlasit" name="prihlaseni">
                        </div>
                    </div>
                </form>
            </div>
        </div>
</body>
</html>