<?php
    session_start();
    var_dump($_SESSION);
    include 'nav.php';
    if (isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == false) {
        require_once "db.php";
        $id = $_GET['id'];
        $sql = "DELETE FROM autobazar_inzeraty WHERE id = $id";
        $con->query($sql);
        $con->close();
        header("location: index.php");
        die();
    } else {
        header("location: index.php");
        die();
    }
?>