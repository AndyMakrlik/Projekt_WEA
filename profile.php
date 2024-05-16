<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="styleIndex.css">
    <title>Uživatel</title>
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

    <h1>Zdravím uživateli <?= $_SESSION["prezdivka"] ?></h1>
    <form action="logout.php" method="post">
        <button>Odhlásit se</button>
    </form>
    <form action="index.php" method="post">
        <button>Přejít na inzeráty</button>
    </form>
</body>
</html>