<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/info.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>O nás</title>
</head>
<body>
    <?php
        session_start();
        include 'nav.php';
    ?>

    <div class="w3-container w3-padding-32 section" id="about">
        <h1 class="w3-border-bottom w3-border-light-grey w3-padding-16">O nás</h1>
        <p>Vítejte na stránce O nás. Jsme přední společnost poskytující kvalitní služby a produkty pro naše zákazníky. Naše pobočky jsou strategicky rozmístěny, aby byly dostupné pro všechny.</p>
    </div>

    <div class="w3-container w3-padding-32" id="branches">
        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">Pobočky</h2>
        <ul class="w3-ul w3-card-4">
            <li class="w3-padding-16 branch-container">
                <img src="https://img.tipcars.com/foto_bazary/4854/?1687353114" alt="Praha" class="branch-image">
                <div class="branch-info">
                    <span>Praha</span><br>
                    Adresa: Ulice 123, Praha 1<br>
                    Telefon: +420 720 862 278<br>
                    <button class="read-more-btn" onclick="toggleOpeningHours('praha')">Číst více</button>
                    <div id="praha-hours" class="opening-hours-info"></div>
                </div>
            </li>
            <li class="w3-padding-16 branch-container">
                <img src="https://img.tipcars.com/foto_bazary/1608/?0" alt="Brno" class="branch-image">
                <div class="branch-info">
                    <span>Brno</span><br>
                    Adresa: Ulice 456, Brno<br>
                    Telefon: +420 725 227 595<br>
                    <button class="read-more-btn" onclick="toggleOpeningHours('brno')">Číst více</button>
                    <div id="brno-hours" class="opening-hours-info"></div>
                </div>
            </li>
            <li class="w3-padding-16 branch-container">
                <img src="https://img.tipcars.com/foto_bazary/0019/?0" alt="Ostrava" class="branch-image">
                <div class="branch-info">
                    <span>Ostrava</span><br>
                    Adresa: Ulice 789, Ostrava<br>
                    Telefon: +420 751 254 780<br>
                    <button class="read-more-btn" onclick="toggleOpeningHours('ostrava')">Číst více</button>
                    <div id="ostrava-hours" class="opening-hours-info"></div>
                </div>
            </li>
        </ul>
    </div>

    <div class="w3-container w3-padding-32 section" id="opening-hours">
        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">Otevírací doba</h2>
        <table class="w3-table-all w3-card-4">
            <thead>
                <tr class="w3-light-grey">
                    <th>Den</th>
                    <th>Otevírací doba</th>
                </tr>
            </thead>
            <tr>
                <td>Pondělí - Pátek</td>
                <td>9:00 - 18:00</td>
            </tr>
            <tr>
                <td>Sobota</td>
                <td>10:00 - 14:00</td>
            </tr>
            <tr>
                <td>Neděle</td>
                <td>Zavřeno</td>
            </tr>
        </table>
    </div>

    <div class="w3-container w3-padding-32 section" id="additional-info">
        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">Další informace</h2>
        <p>Naše společnost se zaměřuje na poskytování prvotřídních služeb a produktů, které splňují potřeby našich zákazníků. Pokud máte jakékoli dotazy, neváhejte nás kontaktovat prostřednictvím našich poboček nebo telefonicky.</p>
    </div>

    <script>
        function checkOpeningHours(branchId) {
            const now = new Date();
            const day = now.getDay();
            const hour = now.getHours();
            const minutes = now.getMinutes();

            let isOpen = false;
            if (day >= 1 && day <= 5) {
                if (hour >= 9 && (hour < 18 || (hour === 18 && minutes === 0))) {
                    isOpen = true;
                }
            } else if (day === 6) {
                if (hour >= 10 && (hour < 14 || (hour === 14 && minutes === 0))) {
                    isOpen = true;
                }
            }

            const openingHoursInfo = document.getElementById(`${branchId}-hours`);
            openingHoursInfo.innerHTML = isOpen ? "Otevřeno" : "Zavřeno";
        }

        function toggleOpeningHours(branchId) {
            const openingHoursInfo = document.getElementById(`${branchId}-hours`);
            const button = openingHoursInfo.previousElementSibling;
            if (openingHoursInfo.style.display === 'block') {
                openingHoursInfo.style.display = 'none';
                button.innerHTML = 'Číst více';
            } else {
                checkOpeningHours(branchId);
                openingHoursInfo.style.display = 'block';
                button.innerHTML = 'Číst méně';
            }
        }
    </script>

</body>
</html>
