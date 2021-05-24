<?php
    session_start();
?>

<html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style/home.css">
        <title>Auditorium</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Antic&family=Della+Respira&family=Maven+Pro&family=Nanum+Myeongjo&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="script/shop.js" defer="true"></script>
    </head>

    <body>
        <header>
            <nav>
                <a class="button" href="home.php">Home</a>
                <?php
                if (isset($_SESSION["nome"])) {
                    echo '<a class="button" href="ordini.php">I miei ordini</a>';
                    echo '<a class="button" href="carrello.php">Carrello</a>';
                }
                ?>
                <?php
                if (!isset($_SESSION["nome"])) {
                    echo '<a class="button" href="login.php">Login</a>';
                } else {
                    echo '<a class="button" href="logout.php">Logout</a>';
                }
                ?>
            </nav>
            
            <div id="logo">
                <h1>Auditorium</h1>
                <div class="overlay"></div>
            </div>
        </header>

        <div>
            <h2>Il tuo carrello</h2>
            <div id="contenitore"> 
            <table></table>
            </div>
                <h3 class="hidden">Il carrello è vuoto</h3>
        </div>

        <footer>
            <em>Auditorium</em> nasce nel 2020, con l'idea di far entrare la musica all'interno di tutte le case, creando il primo e-commerce italiano totalmente dedito ad essa.
            <p><em>Auditorium, costruito intorno a te.</em><br>
                Tamara Galeno - O46002046
            </p>
        </footer>
    </body>
</html>