<?php
    session_start();
    $registration = false;
    $add = false;
    $edit = false;
    $logout = false;
    $delete = false;
    $nothing = false;
    if (isset($_SESSION['registration']) && $_SESSION['registration'] == true) {
        $registration = true;
        unset($_SESSION['registration']);
    }
    if (isset($_SESSION['add']) && $_SESSION['add'] == true) {
        $add = true;
        unset($_SESSION['add']);
    }
    if (isset($_SESSION['edit']) && $_SESSION['edit'] == true) {
        $edit = true;
        unset($_SESSION['edit']);
    }
    if (isset($_SESSION['logout']) && $_SESSION['logout'] == true) {
        $logout = true;
        unset($_SESSION['logout']);
    }
    if (isset($_SESSION['delete']) && $_SESSION['delete'] == true) {
        $delete = true;
        unset($_SESSION['delete']);
    }

    if (isset($_SESSION['nothing']) && $_SESSION['nothing'] == true) {
        $nothing = true;
        unset($_SESSION['nothing']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Autobazar</title>
</head>
<body>
    <div id="alertNothing">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Smůla!</strong> Aktuálně nemáme k dispozici žádná auta k inzerci.
    </div>
    <div id="alertRegistration">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Úspěch!</strong> Jste registrován.
    </div>
    <div id="alertAdd">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Úspěch!</strong> Přidal jste inzerát.
    </div>
    <div id="alertEdit">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Úspěch!</strong> Upravil jste inzerát.
    </div>
    <div id="alertLogout">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Úspěch!</strong> Odhlásil jste se.
    </div>
    <div id="alertDelete">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Úspěch!</strong> Odstranil jste inzerát.
    </div> 
    <?php
        //var_dump($_SESSION);
        include 'nav.php';
    ?>

    <div class="w3-display-container" style="height: 100px">
        <div class="w3-display-middle">
            <h1 id="nazev">Vítáme tě na autobazaru ProfiAuto</h1>
        </div>
    </div> 
    
    <?php
        require_once "db.php";
        if ($con->connect_error) {
            die("CHyba připojení k databázi: " . $con->connect_error);
        }

        $sql = "SELECT * FROM autobazar_inzeraty";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            echo '<div id="inzeraty">';
            while ($inzerat = $result->fetch_assoc()) {
                echo '
                    <div class="inzerat">
                        <h2>' . $inzerat["nazev"] . '</h2>
                        <img class="auto" src="' . $inzerat["obrazek"] . '" alt="Obrázek auta">
                        <p><strong>Cena:</strong> ' . formatCisla($inzerat["cena"]) . ' Kč</p>
                        <p><strong>Značka auta:</strong> ' . $inzerat["znacka"] . '</p>
                        <p><strong>Model auta:</strong> ' . $inzerat["model"] . '</p>
                        <p><strong>Rok výroby:</strong> ' . $inzerat["rok"] . '</p>
                        <p><strong>Motor/Výkon:</strong> ' . $inzerat["motor"] . '</p>
                        <p><strong>Palivo:</strong> ' . $inzerat["palivo"] . '</p>
                        <p><strong>Převodovka:</strong> ' . $inzerat["prevodovka"] . '</p>
                        <p><strong>Najeto:</strong> ' . formatCisla($inzerat["najezd"]) . ' Km</p>
                        <p><strong>Popis:</strong> ' . $inzerat["popis"] . '</p>
                ';
                if(isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == true && isset($_SESSION["id_uzivatele"]) && $_SESSION["id_uzivatele"] == $inzerat["fk_uzivatel"]) {
                    echo '<form action="delete.php" method="GET"><button type="submit" class="odstranit">❌</button><input type="hidden" name="id" value="' . $inzerat["id"] . '"><input type="hidden" name="fk" value="' . $inzerat["fk_uzivatel"] . '"></form>';
                    echo '<form action="edit.php" method="GET"><button type="submit" class="upravit"><input type="hidden" name="id" value="' . $inzerat["id"] . '"></button></form>';
                }
                    echo '</div>';
            }
            echo '</div>';
        } else {
            $_SESSION["nothing"] = true;
        }
        
        $con->close();

        function formatCisla($cislo) {
            return number_format($cislo, 0, '.', ' ');
        }
    ?>
    <script>
        <?php if ($registration): ?>
            const div = document.getElementById("alertRegistration");
            div.style.display = 'block';
            setTimeout(function() {div.style.display = 'none'; }, 10000);
        <?php endif; ?>
        <?php if ($add): ?>
            const div = document.getElementById("alertAdd");
            div.style.display = 'block';
            setTimeout(function() {div.style.display = 'none'; }, 10000);
        <?php endif; ?>
        <?php if ($edit): ?>
            const div = document.getElementById("alertEdit");
            div.style.display = 'block';
            setTimeout(function() {div.style.display = 'none'; }, 10000);
        <?php endif; ?>
        <?php if ($logout): ?>
            const div = document.getElementById("alertLogout");
            div.style.display = 'block';
            setTimeout(function() {div.style.display = 'none'; }, 10000);
        <?php endif; ?>
        <?php if ($delete): ?>
            const div = document.getElementById("alertDelete");
            div.style.display = 'block';
            setTimeout(function() {div.style.display = 'none'; }, 10000);
        <?php endif; ?>
        <?php if ($nothing): ?>
            const div = document.getElementById("alertNothing");
            div.style.display = 'block';
        <?php endif; ?>
    </script>  
</body>
</html>