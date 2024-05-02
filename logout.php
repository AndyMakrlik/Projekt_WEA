<?php
    session_start();
    var_dump($_SESSION);
    $_SESSION["jePrihlasen"] = false;
    unset($_SESSION["prezdivka"]);
    header("location: index.php");
    die();
?>