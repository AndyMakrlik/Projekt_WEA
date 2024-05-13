<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleIndex.css">
    <link rel="stylesheet" href="styleIndexRegistration.css">
    <script src="https://kit.fontawesome.com/b9aa334442.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Registrace</title>
</head>
<body>
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

    <?php
            session_start();

            var_dump($_SESSION);
            var_dump($_POST);
            $chyby = "";

            

            if (isset($_POST["registrace"])){
                if (strlen($_POST["prezdivka"]) < 5) {
                    $chyby .= "Přezdívka by měla mít aspoň 5 znaků! \n";
                }
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $chyby .= "Email zapište ve správném formátu! \n";
                }
                if (strlen($_POST["heslo"]) < 8) {
                    $chyby .= "Heslo by mělo být delší než 8 znaků! \n";
                }

                if (empty($chyby)) {
                    require_once "db.php";
                    $prezdivka = $_POST["prezdivka"];
                    $email = $_POST["email"];
                    $heslo = $_POST["heslo"];

                    $sifrovaneHeslo = password_hash($heslo, PASSWORD_BCRYPT);
                    $sql = "INSERT INTO autobazar(prezdivka, email, heslo) VALUES('$prezdivka', '$email', '$sifrovaneHeslo')";
                    $con->query($sql);
                }
            }
            echo $chyby;
        ?>

    <div class="div">
        <div class="formular">
            <h1>Registrace</h1>
            <form action="registration.php" method="post">
                <div class="vstupy">
                    <div class="vstupniPole">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Přezdívka" name="prezdivka">
                    </div>
                    <div class="vstupniPole">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email">
                    </div>
                    <div class="vstupniPole">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" placeholder="Heslo" name="heslo">
                    </div>
                    <div>
                        <input type="submit" value="Registrovat" name="registrace">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>