<?php
    session_start();     
?>

<html>
    <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="style/list.css">
      <title>Auditorium</title>
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Antic&family=Della+Respira&family=Maven+Pro&family=Nanum+Myeongjo&display=swap" rel="stylesheet">
      <script src="script/script.js" defer="true"></script>
      <meta name="viewport"content="width=device-width, initial-scale=1">    
    </head>   

    <body>
        <header>
            <nav> 
                    <a class="button" href="home.php">Home</a>
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
                            echo '<a class="button" href="home.php">Logout</a>';
                        }
                    ?>
            </nav>
            <div id="logo">
                <h1>Auditorium</h1> 
                <div class="overlay"></div>
            </div>
        </header>

        <div id="ricerca">
            Cerca i prodotti:
            <form>
                <input type="text" id="barra">
            </form>
        </div>

        <article>
            <section id="lista_prodotti"></section>
        </article>
        
        <footer>
            <em>Auditorium</em> nasce nel 2020, con l'idea di far entrare la musica all'interno di tutte le case, creando il primo e-commerce italiano totalmente dedito ad essa.
            <p><em>Auditorium, costruito intorno a te.</em><br>
                Tamara Galeno - O46002046
            </p> 
        </footer>
        </body>
    </body>
</html>