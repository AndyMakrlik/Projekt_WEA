<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title><?= $_SESSION["prezdivka"] ?></title>
</head>
<body>
    <?php
        var_dump($_SESSION);
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