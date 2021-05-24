<?php
    /* Si avvia la sessione o ci si ricollega se esiste già */
    session_start();
    require "db_config.php";

    if(isset($_SESSION["nome"])){
        header("Location: home.php");
        exit;
    }

    $err=false;
    if(isset($_POST["mail"]) && isset($_POST["psw"])){  
        //Connessione al DB
        $connection = mysqli_connect($dbconfig["host"],$dbconfig["user"], $dbconfig["password"], $dbconfig["name"]) or die("Errore" . mysqli_connect_error());
        //Preparazione della stringa contenente il comando SQL
        $mail = mysqli_real_escape_string($connection, $_POST["mail"]);
        $psw = mysqli_real_escape_string($connection, $_POST["psw"]);
        //Verifica della validità dell'email
        if($input_mail = filter_var($mail, FILTER_VALIDATE_EMAIL)){
            //Query al DB
            $query = "SELECT id, nome, psw FROM CLIENTE where mail ='" .$input_mail. "'" ;
            //Esecuzione query
            $res = mysqli_query($connection, $query) or die(mysqli_error($connection));
            if(mysqli_num_rows($res) > 0){ //in quanto è possibile creare un solo account con uno stesso indirizzo email
                $cliente = mysqli_fetch_assoc($res);
                if(password_verify($_POST["psw"], $cliente["psw"])){ //TEMPORANEO, successivamente utilizzare password_verify(), quando farò password_hash() in signup.php
                    $_SESSION["nome"]=$cliente["nome"];
                    $_SESSION["id"]=$cliente["id"];
                    header("Location: home.php");
                    mysqli_close($connection);
                    exit;
                }
                else {
                    $err = true;
                }
            }
            else {
                $err = true;
            }
        }
    
        else{
            $err=true;
        }
    }
?>

<html>
    <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="style/login.css">
      <title>Auditorium</title>
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Antic&family=Della+Respira&family=Maven+Pro&family=Nanum+Myeongjo&display=swap" rel="stylesheet">
      <meta name="viewport"content="width=device-width, initial-scale=1">    
    </head>   

    <body>
        <header>
            <nav>
                <a class="button" href="home.php">Home</a>
            </nav>
            <div id="logo">
                <h1>Auditorium</h1>
                <div class="overlay"></div>
            </div>
        </header>

        <section id="log">  
            <form name="login" method="post">
                <h2>Hello, passenger!</h2>
                <div>
                <input type="text" name="mail" placeholder="Email"></div>
                <div>
                <input type="password" name="psw" placeholder="Password">
                </div>
                <?php 
                    if ($err==true)
                        echo "<h6 class='error'>Credenziali non valide!</h6>"; 
                ?>
                <input type="submit" value="Accedi" class="button">
                
            <h5 class="signup">Non hai ancora un account? Che aspetti, <a href="signup.php">iscriviti qui</a>!</h5>
            </form> 
        </section>

        <footer>
            <em>Auditorium</em> nasce nel 2020, con l'idea di far entrare la musica all'interno di tutte le case, creando il primo e-commerce italiano totalmente dedito ad essa.
            <p><em>Auditorium, costruito intorno a te.</em><br>
                Tamara Galeno - O46002046
            </p> 
        </footer>
    </body>
</html>