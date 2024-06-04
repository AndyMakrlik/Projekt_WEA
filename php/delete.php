<?php
    session_start();
    //var_dump($_SESSION);
    include 'nav.php';
    if (isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == true) {
        require_once "db.php";
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "DELETE FROM autobazar_inzeraty WHERE id = $id";
            $con->query($sql);
            $con->close();
            $_SESSION["delete"] = true;
            header("location: index.php");
            die();
        }
    } else {
        header("location: index.php");
        die();
    }
?>