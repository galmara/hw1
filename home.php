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
      <script src="script/home.js" defer="true"></script>
      <meta name="viewport"content="width=device-width, initial-scale=1">    
    </head>   

    <body>
        <header>
            <nav> 
                    <a class="button">Home</a>
                    <?php
                        if(isset($_SESSION["nome"])){
                            echo '<a class="button" href="ordini.php">I miei ordini</a>';
                            echo '<a class="button" href="carrello.php">Carrello</a>';
                        }
                    ?>
                    <?php
                        if(!isset($_SESSION["nome"])){
                            echo '<a class="button" href="login.php">Login</a>';
                        }
                        else {
                            echo '<a class="button" href="logout.php">Logout</a>';
                        }
                    ?>
                    
            </nav>
            <div id="logo">
                <h1>Auditorium</h1> 
                <div class="overlay"></div>
            </div>
        </header>

        <div id="descr">
        <?php
                if(isset($_SESSION["nome"])){
                    echo "<h1>Hello, " . $_SESSION["nome"] . "!</h1>";
                }
                else {
                    echo "<h1>Il nuovo e-commerce <strong>prettamente musicale</strong> aspetta solo te!<h1>";
                }
            
        ?>

        <a class="button" id="prodotti" href="list.php">Scopri i nostri prodotti</a>


        </div>

        <section id="container">
            <div class="service">
                <h2> Filtra per categoria: </h2>
                <div class="cont">
                <div id = amplificazione class="categoria"><a>
                    <img src="images/amplifier.jpg">
                    <h3>Amplificazione</h3>
                </a></div>

                <div id = strumento class="categoria"> <a> 
                    <img src="images/instruments.jpg">
                    <h3>Strumentazione</h3>
                </a></div>

                <div id=accessorio class="categoria"><a>
                    <img src="images/accessories.jpg">
                    <h3>Accessori e altro</h3>
                </a></div>
                </div>
            </div>

            <div class="service">
                <h2>Scopri gli ultimi grandi successi</h2>
                <h5>Powered by <a href="https://www.spotify.com/">Spotify</a></h5>
                <div class="cont" id="uscite"></div>
            </div>
        </section>

        <div class="service" id="int">
            <h2>Sei un autodidatta? Impara con noi!</h2>
            <h5>Powered by <a href="https://www.songsterr.com/">Songsterr</a></h5>
            <form>
                <input type="text" id="barra" placeholder="Digita artista o titolo">
                <input type="submit" value="Cerca" class="button">
            </form>
            <section id = "tabs">

            </section>
        </div>

        <footer>
            <em>Auditorium</em> nasce nel 2020, con l'idea di far entrare la musica all'interno di tutte le case, creando il primo e-commerce italiano totalmente dedito ad essa.
            <p><em>Auditorium, costruito intorno a te.</em><br>
                Tamara Galeno - O46002046
            </p> 
        </footer>
        </body>


    </body>
</html>