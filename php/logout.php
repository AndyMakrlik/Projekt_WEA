<?php
    session_start();
    var_dump($_SESSION);
    $_SESSION["jePrihlasen"] = false;
    header("location: index.php");
    die();
?>