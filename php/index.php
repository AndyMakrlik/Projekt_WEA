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
    <?php
        session_start();
        var_dump($_SESSION);
        include 'nav.php';
    ?>

    <div class="w3-display-container" style="height: 100px">
        <div class="w3-display-middle">
            <h1 id="nazev">Vítáme tě na aukčním webu AutoBuznoš</h1>
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
                        <p><strong>Popis:</strong> ' . $inzerat["popis"] . '</p>';
                        if(isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == true) {
                            echo '<button class="odstranit"><a href="delete.php?id=' . $inzerat["id"] . '">❌</a></button>';
                            echo '<a href="../php/edit.php?id=' . $inzerat["id"] . '"><button class="upravit"></button></a>';
                        }
                        echo '</div>';
            }
            echo '</div>';
        } else {
            echo 'Nejsou tu žádne inzeráty!';
        }
        
        $con->close();

        function formatCisla($cislo) {
            return number_format($cislo, 0, '.', ' ');
        }
    ?>  
</body>
</html>