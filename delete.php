<?php
    session_start();
    if(isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == true) {
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