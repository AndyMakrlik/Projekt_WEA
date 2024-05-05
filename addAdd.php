<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidání inzerátu</title>
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

    <h2>Přidat inzerát auta</h1>
    <form action="" method="post">
        <label for="znacka" >Značka auta:</label>
        <input type="text" id="znacka" name="znacka" ><br>
        <label for="model">Model auta:</label>
        <input type="text" id="model" name="model" ><br>

        <label for="rok_vyroby">Rok výroby:</label>
        <input type="text" id="rok_vyroby" name="rok_vyroby" ><br>

        <label for="motor">Motor:</label>
        <input id="motor" name="motor"></input><br>

        <button type="submit">Přidat inzerát</button>
    </form>
</body>
</html>