<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/change.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <script src="https://kit.fontawesome.com/b9aa334442.js" crossorigin="anonymous"></script>
    <title>Změna hesla</title>
</head>
<body>
    <?php 
        session_start();
        //var_dump($_SESSION);
        include 'nav.php';
        if (isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == false) {
            header("location: index.php");
            die();
        };

        $chyby = array(
            'stareHeslo' => '',
            'noveHeslo' => ''
        );

        if (isset($_POST["zmenit"])) {
            if (strlen($_POST["noveHeslo"]) < 8) {
                $chyby['noveHeslo'] .= "Heslo by mělo být delší než 8 znaků!";
            }

            if (strlen($_POST["stareHeslo"]) < 8) {
                $chyby['stareHeslo'] .= "Heslo by mělo být delší než 8 znaků!";
            }

            if (empty($chyby['stareHeslo']) && empty($chyby['noveHeslo'])) {
                require_once "db.php";   
                $prezdivka = $_SESSION['prezdivka'];             
                $sql = "SELECT * FROM autobazar WHERE prezdivka = '$prezdivka';";
                $vysledek = $con->query($sql);
                if ($vysledek->num_rows == 1) {
                    //print_r($vysledek);
                    $uzivatel = $vysledek->fetch_object();
                    $stareHeslo = $_POST["stareHeslo"];
                    $noveHeslo = $_POST["noveHeslo"];
                    $zasifrovaneHeslo = $uzivatel->heslo;
                    
                    if (password_verify($stareHeslo, $zasifrovaneHeslo)) {
                        $sifrovaneHeslo = password_hash($noveHeslo, PASSWORD_BCRYPT);
                        $sql = "UPDATE autobazar SET heslo = '$sifrovaneHeslo' WHERE prezdivka = '$prezdivka';";
                        $con->query($sql);
                        $con->close();
                        $_SESSION['change'] = true;
                        header("location: profile.php");
                        die();
                    } else {
                        $chyby['stareHeslo'] .= "Heslo neodpovídá starému heslu!";
                    }
                }
            }
        }
    ?>

    <div id="div">
        <div id="formular">
            <h1>Změna hesla</h1>
            <form action="change.php" method="post">
                <div id="vstupy">
                    <div class="vstupniPole">
                        <i class="fa-solid fa-key"></i>
                        <input class="informace" type="password" placeholder="Staré heslo" name="stareHeslo">
                    </div>
                    <?php if ($chyby['stareHeslo']): ?>
                        <div class="error"><?= $chyby['stareHeslo'] ?></div>
                    <?php endif; ?>
                    <div class="vstupniPole">
                        <i class="fa-solid fa-key"></i>
                        <input class="informace" type="password" placeholder="Nové heslo" name="noveHeslo">
                    </div>
                    <?php if ($chyby['noveHeslo']): ?>
                        <div class="error"><?= $chyby['noveHeslo'] ?></div>
                    <?php endif; ?>
                    <div>
                        <input id="zmenit" type="submit" value="Změnit" name="zmenit">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
        
    ?>
</body>
</html>