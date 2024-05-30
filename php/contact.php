<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Kontakt</title>
</head>
<body>
    <?php
        session_start();
        var_dump($_SESSION);
        include 'nav.php';
    ?>
    <h2 style="text-align:center">Náš Tým</h2>
    <div class="row">
        <div class="column">
            <div class="card">
                <img class="profileImg" src="../img/andy.png" alt="Andy" style="width:100%">
                <div class="container">
                    <h2>Andrej Makrlík</h2>
                    <p class="title">Majitel & Zakladatel</p>
                    <p>Firmu jsem založil v roce 1990, v té době to začínalo hezky, ale pak přišla krize a skoro firma zbankrotovala, ale naštěstí přišel jeden investor, který tomuto bazaru věřil a tak zainvestoval milióny a na oplátku jsem ho udělal spolumajitelem a firma od této dobu už jen rostla víš a víš.</p>
                    <p class="pInfo">Email: andymakrlik@gmail.com</p>
                    <p class="pInfo">Telefon: +420 776 322 046</p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img class="profileImg" src="../img/kiko.png" alt="Kiko" style="width:100%">
                <div class="container">
                    <h2>Christian Ullmann</h2>
                    <p class="title">Spolumajitel & Investor</p>
                    <p>Když byla firma v krizi, rozhodl jsem se zariskovat a jak vidíte dnes tak se to velmi vyplatilo a dodneška toho nelituji, máme výborného mechanika, který se o vše dokáže postarat a vše dokáže spravit. Dřív jsem také podnikal, jenže má firma tolik nezkvétala tak jsem se rozhodl investovat.</p>
                    <p class="pInfo">Email: christianullmann@gmail.com</p>
                    <p class="pInfo">Telefon: +420 774 492 296</p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img class="profileImg" src="../img/john.png" alt="John" style="width:100%">
                <div class="container">
                    <h2>Václav Kubrt</h2>
                    <p class="title">Automechanik</p>
                    <p>V roce 1990 jsem zrovna dostudoval obor automechanika. Neměl jsem žádnou praxi a nikde mě nechtěli kvůli tomu zaměstnat. Avšak jednoho dne jsem dostal nabídku, že mě ve firmě autobuznoš zaměstnají a zaplatí mi kurz na doučení a od té doby se mi jenom daří a stále se zlepšuji.</p>
                    <p class="pInfo">Email: vasekkubrt@gmail.com</p>
                    <p class="pInfo">Telefon: +420 774 678 299</p>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>