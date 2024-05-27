<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/change.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <title>Změna hesla</title>
</head>
<body>
    <?php 
        session_start();
        var_dump($_SESSION);
        include 'nav.php';
        if (isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == false) {
            header("location: index.php");
            die();
        }
    ?>
</body>
</html>