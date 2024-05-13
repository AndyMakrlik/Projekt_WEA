<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleIndex.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Inzeráty</title>
    <style>
        
    </style>
</head>
<body>
    <?php
        session_start();
        var_dump($_SESSION);
    ?>

    <nav class="navBar">
        <div class="navDiv">
            <div class="">
                <div class="divLogo"><img src="img\logo.png" alt="Logo" style="height: 100px;"></div>
                <div class="divBut">
                    <?php
                        if (isset($_SESSION["jePrihlasen"])) {
                            if($_SESSION["jePrihlasen"] == true){
                                echo '
                                    <button class="addBut"><a href="addAdd.php">Přidat Inzerát</a></button>
                                ';
                            }   
                        } 
                    ?>
                </div>
            </div>
            
            <ul>
                <li><a href="index.php">Domů</a></li>
                <li><a href="info.php">O nás</a></li>
                <li><a href="contact.php">Kontakt</a></li>
                <?php
                    if (isset($_SESSION["jePrihlasen"])) {
                        if($_SESSION["jePrihlasen"] == false){
                            echo '
                                <button class="navBut"><a href="login.php">Přihlásit</a></button>
                                <button class="navBut"><a href="registration.php">Registrovat</a></button>
                            ';
                        } else {
                            echo'
                                <button class="profileBut"><a href="profile.php">Profil</a></button>
                            ';
                        }
                    } else {
                        echo '
                                <button class="navBut"><a href="login.php">Přihlásit</a></button>
                                <button class="navBut"><a href="registration.php">Registrovat</a></button>
                            ';
                    }
                ?>
                
            </ul>
        </div>
    </nav>

    <div class="w3-display-container" style="height: 100px">
        <div class="w3-display-middle">
            <h1 id="nazev">Vítáme tě na aukčním webu AutoBuznoš</h1>
        </div>
    </div>
    <div id="inzeraty">
        <div class="inzerat">
            <h2>Škoda Octavia 2.0 TDI</h2>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxVqoCwEnpQrgCCD0MMc0XeNtyCjwUuHiv1GuJPdgAoA&s" alt="Obrázek auta">
            <p><strong>Cena:</strong> 250 000 Kč</p>
            <p><strong>Značka auta:</strong> Škoda</p>
            <p><strong>Model auta:</strong> Octavia</p>
            <p><strong>Rok výroby:</strong> 2018</p>
            <p><strong>Motor:</strong> 2.0 TDI</p>
            <p><strong>Průměrná spotřeba:</strong> 5.0 l/100 km</p>
            <p><strong>Počet majitelů:</strong> 1</p>
            <p><strong>Popis:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae nisi vitae neque tincidunt fermentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae nisi vitae neque tincidunt fermentum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae nisi vitae neque tincidunt fermentum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae nisi vitae neque tincidunt fermentum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae nisi vitae neque tincidunt fermentum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae nisi vitae neque tincidunt fermentum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae nisi vitae neque tincidunt fermentum.</p>            
        </div>            
    </div>    
</body>
</html>