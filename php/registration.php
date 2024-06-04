<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/registration.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://kit.fontawesome.com/b9aa334442.js" crossorigin="anonymous"></script>
    <title>Registrace</title>
</head>
<body>
    <?php
        session_start();
        //var_dump($_SESSION);
        //var_dump($_POST);
        include 'nav.php';
        $chyby = array(
            'prezdivka' => '',
            'email' => '',
            'heslo' => ''
        );

        if (isset($_POST["registrace"])){
            if (strlen($_POST["prezdivka"]) < 5) {
                $chyby['prezdivka'] = "Přezdívka by měla mít aspoň 5 znaků!";
            }
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $chyby['email'] = "Email zapište ve správném formátu!";
            }
            if (strlen($_POST["heslo"]) < 8) {
                $chyby['heslo'] = "Heslo by mělo být delší než 8 znaků!";
            }
            if (empty($chyby['prezdivka']) && empty($chyby['email']) && empty($chyby['heslo'])) {
                require_once "db.php";
                $jmeno = $_POST["prezdivka"];
                $mail = $_POST["email"];
                $sql = "SELECT * FROM autobazar WHERE prezdivka = '$jmeno'";
                $result = $con->query($sql);
                $sqlEmail = "SELECT * FROM autobazar WHERE email = '$mail'";
                $vysledek = $con->query($sqlEmail);
                if ($result->num_rows > 0) {
                    $chyby["prezdivka"] = "Přezdívku již používá jíný uživatel";
                    $con->close();
                } else if ($vysledek->num_rows > 0) {
                    $chyby["email"] = "Email již používá jíný uživatel";
                    $con->close();
                } else {
                    $prezdivka = $_POST["prezdivka"];
                    $email = $_POST["email"];
                    $heslo = $_POST["heslo"];
                    $sifrovaneHeslo = password_hash($heslo, PASSWORD_BCRYPT);
                    $sql = "INSERT INTO autobazar(prezdivka, email, heslo) VALUES('$prezdivka', '$email', '$sifrovaneHeslo');";
                    $con->query($sql);
                    $con->close();
                    $_SESSION['registration'] = true;
                    header("location: index.php");
                }   
            }
        }
    ?>

    <div id="div">
        <div id="formular">
            <h1>Registrace</h1>
            <form action="registration.php" method="post">
                <div class="vstupy">
                    <div class="vstupniPole">
                        <i class="fa-solid fa-user"></i>
                        <input class="informace" type="text" placeholder="Přezdívka" name="prezdivka">
                    </div>
                    <?php if ($chyby['prezdivka']): ?>
                        <span class="error"><?= $chyby['prezdivka'] ?></span>
                    <?php endif; ?>
                    <div class="vstupniPole">
                        <i class="fa-solid fa-envelope"></i>
                        <input class="informace" type="email" placeholder="Email" name="email">
                    </div>
                    <?php if ($chyby['email']): ?>
                            <div class="error"><?= $chyby['email'] ?></div>
                        <?php endif; ?>
                    <div class="vstupniPole">
                        <i class="fa-solid fa-key"></i>
                        <input class="informace" type="password" placeholder="Heslo" name="heslo">
                    </div>
                    <?php if ($chyby['heslo']): ?>
                        <div class="error"><?= $chyby['heslo'] ?></div>
                    <?php endif; ?>
                    <div>
                        <input id="registrovat" type="submit" value="Registrovat" name="registrace">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>