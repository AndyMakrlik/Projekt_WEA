<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uživatel</title>
</head>
<body>
    <?php
        session_start();
        var_dump($_SESSION);
        if (!$_SESSION["jePrihlasen"]) {
            header("location: index.php");
            die();
        }
    ?>
    <h1>Zdravím uživateli <?= $_SESSION["prezdivka"] ?></h1>
    <form action="logout.php" method="post">
        <button>Odhlásit se</button>
    </form>
    <form action="enterAsAdmin.php" method="post">
        <button>Přejít na inzeráty</button>
    </form>
</body>
</html>