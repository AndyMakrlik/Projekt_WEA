<nav class="navBar">
    <div class="navDiv">
        <div class="divLogo">
            <a href="index.php"><img src="../img/logo.png" alt="Logo" style="height: 100px;"></a>
        </div>
        <?php if (isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == true): ?>
            <div class="divBut">
                <form action="add.php">
                    <button class="addBut">Přidat inzerát</button>
                </form>  
            </div>
        <?php endif; ?>
        <ul>
            <li><a href="index.php">Domů</a></li>
            <li><a href="info.php">O nás</a></li>
            <li><a href="contact.php">Kontakt</a></li>
        </ul>
        <?php if (isset($_SESSION["jePrihlasen"]) && $_SESSION["jePrihlasen"] == true): ?>
            <div>
                <form action="profile.php">
                    <button class="profileBut">Profil</button>
                </form>  
            </div>
        <?php else: ?>
            <div>
                <form action="login.php" class="formBut"><button class="navBut">Přihlásit</button></form>
                <form action="registration.php" class="formBut"><button class="navBut">Registrovat</button></form>
            </div>
        <?php endif; ?>
    </div>
</nav>