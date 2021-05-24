<?php
    /* Si avvia la sessione o ci si ricollega se esiste già */
    session_start();
    require "db_config.php";

    if(isset($_SESSION["nome"])){
        header("Location: home.php");
        exit;
    }
   
    
    $err=false;


    if($_SERVER["REQUEST_METHOD"]==="POST"){
        if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["mail"]) && isset($_POST["cell"]) && isset($_POST["password"]) && isset($_POST["password_conf"])){     
            $connection = mysqli_connect($dbconfig["host"],$dbconfig["user"], $dbconfig["password"], $dbconfig["name"]) or die("Errore" . mysqli_connect_error());
            
            
            //Verifica mail 
            if($input_mail = filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)){
                $mail = mysqli_real_escape_string($connection, $input_mail);
                
                $query = "SELECT * from cliente where mail = '".$input_mail. "'";
                
                $cliente = mysqli_query($connection, $query) or die(mysqli_error($connection));
                if (mysqli_num_rows($cliente)>0){
                    $err=true;
                }
            }
    
            //Verifica password - minimo 8 caratteri e massimo 16, minimo un carattere speciale e un carattere numerico
            if(!preg_match('/^[a-zA-Z0-9!£$%&@]{8,16}$/', $_POST["password"])){
                $err=true;  
            } 
            else{ //Verifica conferma password
                if($_POST["password"] !== $_POST["password_conf"]){
                    $err=true;    
                }
            }

            //Verifica cellulare
            if(!preg_match('/^[0-9+]{10,}$/', $_POST["cell"])){
                $err=true;
            }
    
            //Aggiunta al Database
            if($err!==true){
                $nome = mysqli_real_escape_string($connection, $_POST["nome"]);
                $cognome = mysqli_real_escape_string($connection, $_POST["cognome"]);
                $cell = mysqli_real_escape_string($connection, $_POST["cell"]);
                $psw = mysqli_real_escape_string($connection, $_POST["password"]);            
                $password = password_hash($psw, PASSWORD_BCRYPT);
        
                $inserimento = "INSERT INTO cliente(nome, cognome, cellulare, psw, mail) VALUES('$nome', '$cognome', '$cell', '$password', '$mail')"; 
                
                $res = mysqli_query($connection, $inserimento) or die(mysqli_error($connection));

                //Login
                $query = "SELECT id from cliente where mail = '$mail'";
                $res = mysqli_query($connection, $query) or die(mysqli_error($connection));
                $row = mysqli_fetch_assoc($res);
                $_SESSION["nome"]=$nome;
                $_SESSION["id"]=$row["id"];
                header("Location: home.php");
                mysqli_close($connection);
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
      <script src="script/signup.js" defer="true"></script>
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
        <form name="signup" method="post" action="./signup.php">
            <h2>Hello, passenger!</h2>
            <div>
            <input type="text" name="nome" placeholder="Nome"> 
            <input type="text" name="cognome" placeholder="Cognome">
            </div> 
            <div>
            <input type="text" name="mail" id="mail" placeholder="Email"></div>
            <div>
            <input type="text" name="cell" id="cell" placeholder="Numero di cellulare">
            </div>
            <div>
            <input type="password" name="password" id="password" placeholder="Password">
            <input type="password" name="password_conf" id="password_conf" placeholder="Conferma password">
            </div>
            <input type="submit" class="button" value="Registrati">
            <?php 
                    if ($err==true)
                        echo "<h6 class='error'>Riempire correttamente tutti i campi</h6>"; 
            ?>
            
        <h5 class="signup">Hai già un account? Effettua il <a href="login.php">log-in</a>!</h5>
        </form> 
        </section>
        <footer>
            <em>Auditorium</em> nasce nel 2020, con l'idea di far entrare la musica all'interno di tutte le case, creando il primo e-commerce italiano totalmente dedito ad essa.
            <p><em>Auditorium, costruito intorno a te.</em><br>
                Tamara Galeno - O46002046
            </p> 
        </footer>
        </body>


    </body>
</html>
