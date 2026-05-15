<?php
$expozice = [];

if (($handle = fopen("expozice.csv", "r")) !== FALSE) {
    fgetcsv($handle, 1000, ";");

    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $expozice[] = [
            'nazev' => $data[0],
            'popis' => $data[1],
            'kategorie' => $data[2],
            'obrazek' => $data[3]
        ];
    }

    fclose($handle);
}
?>

<!DOCTYPE html> 
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muzeum Praha</title>

    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>

    <header class="hero">
        <nav class="navbar">
            <div class="logo">
                <img src="img/logo.png" alt="Logo muzea">
                <span>Muzeum Frajer</span>
            </div>

            <ul class="nav-links">
                <li><a href="#expozice">Expozice</a></li>
                <li><a href="#premium">Premium</a></li>
                <li><a href="#recenze">Recenze</a></li>
                <li><a href="#faq">FAQ</a></li>
                <li><a href="#rezervace">Rezervace</a></li>
                <li><a href="#kontakt">Kontakt</a></li>
            </ul>

            <div class="burger" id="burger">
                ☰
            </div>
        </nav>

        <div class="hero-content">
            <h1>Objevte historii a umění</h1>
            <p>Moderní muzeum s interaktivními expozicemi a unikátními výstavami.</p>
            <a href="#rezervace" class="btn">Rezervovat vstupenku</a>
        </div>
    </header>

    <section class="countdown-section">
        <h2>Nová výstava začíná za:</h2>

        <div id="countdown">
            <div><span id="days">00</span>
                <p>Dní</p>
            </div>
            <div><span id="hours">00</span>
                <p>Hodin</p>
            </div>
            <div><span id="minutes">00</span>
                <p>Minut</p>
            </div>
            <div><span id="seconds">00</span>
                <p>Sekund</p>
            </div>
        </div>
    </section>

    <section id="expozice" class="section">
        <h2>Naše expozice</h2>

        <div class="cards">
            <?php foreach ($expozice as $expo): ?>

                <div class="card">
                    <img src="<?= htmlspecialchars($expo['obrazek']) ?>" alt="<?= htmlspecialchars($expo['nazev']) ?>">

                    <div class="card-content">
                        <span class="category">
                            <?= htmlspecialchars($expo['kategorie']) ?>
                        </span>

                        <h3>
                            <?= htmlspecialchars($expo['nazev']) ?>
                        </h3>

                        <p>
                            <?= htmlspecialchars($expo['popis']) ?>
                        </p>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </section>

    <section id="premium" class="section premium-section">
        <h2>Prémiové výstavy</h2>

        <div class="carousel">
            <button class="carousel-btn prev">❮</button>

            <div class="carousel-track-container">
                <div class="carousel-track">

                    <div class="carousel-item">
                        <img src="img/premium1.jpg" alt="Premium 1">
                        <h3>Egypt faraonů</h3>
                    </div>

                    <div class="carousel-item">
                        <img src="img/premium2.jpg" alt="Premium 2">
                        <h3>Poklady renesance</h3>
                    </div>

                    <div class="carousel-item">
                        <img src="img/premium3.jpg" alt="Premium 3">
                        <h3>Moderní digitální umění</h3>
                    </div>

                </div>
            </div>

            <button class="carousel-btn next">❯</button>
        </div>
    </section>

    <section id="recenze" class="section reviews">
        <h2>Recenze návštěvníků</h2>

        <div class="review-grid">
            <div class="review-card">
                <p>„Krásné prostředí a úžasné výstavy.“</p>
                <h4>– Jana K.</h4>
            </div>

            <div class="review-card">
                <p>„Moderní muzeum s perfektní atmosférou.“</p>
                <h4>– Petr M.</h4>
            </div>

            <div class="review-card">
                <p>„Výborný zážitek pro celou rodinu.“</p>
                <h4>– Lucie T.</h4>
            </div>
        </div>
    </section>

    <section id="faq" class="section faq">
        <h2>Často kladené dotazy</h2>

        <div class="faq-item">
            <button class="faq-question">
                Jaká je otevírací doba?
            </button>

            <div class="faq-answer">
                Pondělí až neděle od 9:00 do 19:00.
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                Je možné fotografovat?
            </button>

            <div class="faq-answer">
                Ano, bez použití blesku.
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                Je muzeum bezbariérové?
            </button>

            <div class="faq-answer">
                Ano, celé muzeum je plně bezbariérové.
            </div>
        </div>
    </section>

    <section id="rezervace" class="section reservation">
        <h2>Rezervace vstupenek</h2>

        <form action="rezervace.php" method="POST" class="reservation-form">

            <input type="text" name="jmeno" placeholder="Jméno a příjmení" required>

            <input type="email" name="email" placeholder="E-mail" required>

            <input type="date" name="datum" required>

            <input type="time" name="cas" required>

            <input type="number" name="osoby" placeholder="Počet osob" min="1" required>

            <select name="typ" required>
                <option value="">Typ vstupenky</option>
                <option>Dospělý</option>
                <option>Student</option>
                <option>Dítě</option>
                <option>Senior</option>
            </select>

            <textarea name="poznamka" placeholder="Poznámka"></textarea>

            <button type="submit" class="btn">
                Odeslat rezervaci
            </button>
        </form>
    </section>

    <section class="section tickets">
        <h2>Vstupné</h2>

        <div class="ticket-grid">

            <div class="ticket-card">
                <h3>Dospělý</h3>
                <p>250 Kč</p>
            </div>

            <div class="ticket-card">
                <h3>Student</h3>
                <p>180 Kč</p>
            </div>

            <div class="ticket-card">
                <h3>Dítě</h3>
                <p>120 Kč</p>
            </div>

        </div>
    </section>

    <section id="kontakt" class="section contact">
        <h2>Kontakt</h2>

        <div class="contact-wrapper">

            <div class="contact-info">
                <p><strong>Adresa:</strong> Praha 1, Česká republika</p>
                <p><strong>Telefon:</strong> +420 777 777 777</p>
                <p><strong>Email:</strong> info@museum.cz</p>
            </div>

            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2563.123456789!2d14.4378!3d50.0755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b939c0970798b%3A0xf3c5e5b6f6d8!2sPrague!5e0!3m2!1sen!2scz!4v1710000000000"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>
    </section>

    <footer>
        <p>© 2026 Museum Praha | MMK závěrečná práce</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>