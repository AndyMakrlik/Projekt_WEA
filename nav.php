<nav class="navBar">
    <div class="navDiv">
        <div class="">
            <div class="divLogo">
                <a href="index.php"><img src="img/logo.png" alt="Logo" style="height: 100px;"></a>
            </div>
            <div class="divBut">
                <?php if (isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == true): ?>
                    <button class="addBut"><a href="addAdd.php">Přidat Inzerát</a></button>
                <?php endif; ?>
            </div>
        </div>
        <ul>
            <li><a href="index.php">Domů</a></li>
            <li><a href="info.php">O nás</a></li>
            <li><a href="contact.php">Kontakt</a></li>
            <?php if (isset($_SESSION["jePrihlasen"])): ?>
                <?php if ($_SESSION["jePrihlasen"] == false): ?>
                    <button class="navBut"><a href="login.php">Přihlásit</a></button>
                    <button class="navBut"><a href="registration.php">Registrovat</a></button>
                <?php else: ?>
                    <button class="profileBut"><a href="profile.php">Profil</a></button>
                <?php endif; ?>
            <?php else: ?>
                <button class="navBut"><a href="login.php">Přihlásit</a></button>
                <button class="navBut"><a href="registration.php">Registrovat</a></button>
            <?php endif; ?>
        </ul>
    </div>
</nav>