<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Inzeráty</title>
</head>
<body>
    <?php
        session_start();
        var_dump($_SESSION);
    ?>

    <div class="nadpis">
        <H1>Vítáme tě na aukčním webu AutoBuznoš</H1>
    </div>

    <div class="main">
        <form action="login.php" method="post">
            <button type="submit">Přihlaš se</button>
        </form>
        <form action="registration.php" method="post">
            <button type="submit">Registruj se</button>
        </form>
        <?php
            if ($_SESSION["jePrihlasen"]) {
                echo "
                <form action='addAdd.php' method='post'>
                    <button type='submit'>Přidej inzerát</button>
                </form>
                ";
            } else {

            }
        ?>
    </div>   
</body>
</html>