<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Inzeráty</title>
</head>
<body>
    <div class="nadpis">
        <H1>Vítáme tě na aukčním webu AutoBuznoš</H1>
    </div>

<div class="main">
    <form action="login.php"method="post">
        <button type="submit">Přihlaš se</button>
    </form>
        <form action="registration.php"method="post">
        <button type="submit">Registruj se</button>
    </form>
</div>

        <h2>Přidat inzerát auta</h1>
        
        <form action="" method="post">
            <label for="znacka" >Značka auta:</label>
            <input type="text" id="znacka" name="znacka" ><br>

            <label for="model">Model auta:</label>
            <input type="text" id="model" name="model" ><br>

            <label for="rok_vyroby">Rok výroby:</label>
            <input type="text" id="rok_vyroby" name="rok_vyroby" ><br>

            <label for="motor">Motor:</label>
            <input id="motor" name="motor"></input><br>

            <button type="submit">Přidat inzerát</button>
        </form>
    </div>
</body>
</html>