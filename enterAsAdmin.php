<?php
    session_start();
    var_dump($_SESSION);
    header("location: index.php");
    die();
?>