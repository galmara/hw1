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
        <script src="script/product.js" defer="true"></script>
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

        <div id="product">
            <div>
                <h2></h2>
                <div class="details">
                    <img src="">
                    <div class="description">
                        <div>
                            <h6></h6>
                            <div class="pref">
                                <h5><h5> 
                                    <?php 
                                    if (isset($_SESSION["nome"])) {
                                        echo "<img id = 'agg' src='./images/add_pref.png'>";
                                    }
                                    ?>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block">
        <a class="button" id="indietro" href="list.php">Torna a tutti i prodotti</a> 
        </div>


        <footer>
            <em>Auditorium</em> nasce nel 2020, con l'idea di far entrare la musica all'interno di tutte le case, creando il primo e-commerce italiano totalmente dedito ad essa.
            <p><em>Auditorium, costruito intorno a te.</em><br>
                Tamara Galeno - O46002046
            </p>
        </footer>
    </body>
</html>
