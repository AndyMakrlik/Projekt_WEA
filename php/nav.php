<nav class="navBar">
    <div class="navDiv">
        <div class="divLogo">
            <a href="index.php"><img src="../img/logo.png" alt="Logo" style="height: 100px;"></a>
        </div>
        <?php if (isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == true): ?>
            <div class="divBut">
                <button class="addBut"><a href="add.php">Přidat Inzerát</a></button>
            </div>
        <?php endif; ?>
        <ul>
            <li><a href="index.php">Domů</a></li>
            <li><a href="info.php">O nás</a></li>
            <li><a href="contact.php">Kontakt</a></li>
        </ul>
        <?php if (isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == true): ?>
            <div id = navButs>
                <button class="profileBut"><a href="profile.php">Profil</a></button>
            </div>
        <?php else: ?>
            <div id = navButs>
                <button class="navBut"><a href="login.php">Přihlásit</a></button>
                <button class="navBut"><a href="registration.php">Registrovat</a></button>
            </div>
        <?php endif; ?>
    </div>
</nav>