<?php
    session_start();
    $change = false;
    $login = false;
    if (isset($_SESSION['change']) && $_SESSION['change'] == true) {
        $change = true;
        unset($_SESSION['change']);
    }
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        $login = true;
        unset($_SESSION['login']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title><?= $_SESSION["prezdivka"] ?></title>
</head>
<body>
    <div id="alertLogin">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Úspěch!</strong> Jste přihlášen.
    </div>
    <div id="alertChange">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Úspěch!</strong> Změnil jste si heslo.
    </div>
    <script>
        <?php if ($login): ?>
            const div = document.getElementById("alertLogin");
            div.style.display = 'block';
            setTimeout(function() {div.style.display = 'none'; }, 10000);
        <?php endif; ?>
        <?php if ($change): ?>
            const div = document.getElementById("alertChange");
            div.style.display = 'block';
            setTimeout(function() {div.style.display = 'none'; }, 10000);
        <?php endif; ?>
    </script> 
    <?php
        //var_dump($_SESSION);
        include 'nav.php';
        if (isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == false) {
            header("location: index.php");
            die();
        }
    ?>

    <h1 id="nadpis">Zdravím uživateli <?= $_SESSION["prezdivka"] ?></h1>
    <div id="divButs">    
        <form class = "formProfil" action="index.php" method="post">
            <button class="butProfil">Přejít na inzeráty</button>
        </form>
        <form class = "formProfil" action="change.php" method="post">
            <button class="butProfil">Změnit heslo</button>
        </form>
        <form class = "formProfil" action="logout.php" method="post">
            <button class="butProfil">Odhlásit se</button>
        </form>
    </div>
</body>
</html>