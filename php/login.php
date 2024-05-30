<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://kit.fontawesome.com/b9aa334442.js" crossorigin="anonymous"></script>
    <title>Přihlášení</title>
</head>
<body>
    <?php
        session_start();
        var_dump($_SESSION);
        var_dump($_POST);
        include 'nav.php';
        $chyby = array(
            'prezdivka' => '',
            'heslo' => ''
        );
        
        if (isset($_POST["prihlaseni"])) {
            if (strlen($_POST["prezdivka"]) < 5) {
                $chyby['prezdivka'] .= "Přezdívka by měla být delší než 5 znaků! \n";
            }

            if (strlen($_POST["heslo"]) < 8) {
                $chyby['heslo'] .= "Heslo by mělo být delší než 8 znaků! \n";
            }

            if (empty($chyby['prezdivka']) && empty($chyby['heslo'])) {
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

    <div id="div">
        <div id="formular">
            <h1>Přihlášení</h1>
            <form action="login.php" method="post">
                <div id="vstupy">
                    <div class="vstupniPole">
                        <i class="fa-solid fa-user"></i>
                        <input class="informace" type="text" placeholder="Přezdívka" name="prezdivka">
                    </div>
                    <?php if ($chyby['prezdivka']): ?>
                        <span class="error"><?= $chyby['prezdivka'] ?></span>
                    <?php endif; ?>
                    <div class="vstupniPole">
                        <i class="fa-solid fa-key"></i>
                        <input class="informace" type="password" placeholder="Heslo" name="heslo">
                    </div>
                    <?php if ($chyby['heslo']): ?>
                        <div class="error"><?= $chyby['heslo'] ?></div>
                    <?php endif; ?>
                    <div>
                        <input id="prihlasit" type="submit" value="Příhlásit" name="prihlaseni">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>