<?php
    require "db_config.php";

    session_start();
    $connection = mysqli_connect($dbconfig["host"],$dbconfig["user"], $dbconfig["password"], $dbconfig["name"]) or die("Errore" . mysqli_connect_error());

    if(isset($_SESSION["id"])){
        if(isset($_GET["q"])){
            $query = 'SELECT * FROM prodotto WHERE nome = "'.$_GET["q"].'"'; 
            $res = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($res)){
                $query = 'INSERT INTO carrello (cliente, prodotto) VALUES ('.$_SESSION['id'].",".$row['codice'].")";
                mysqli_query($connection, $query);
            }
        }

        $carrello=array();
        $response = array();
        $totale = 0;
        $query = 'SELECT * FROM carrello where cliente = "'.$_SESSION["id"].'"';
        $ris = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($ris)){
            $query = 'SELECT nome, prezzo FROM prodotto WHERE codice = "'.$row["prodotto"].'"';
            $res = mysqli_query($connection, $query);
            while($prodotto = mysqli_fetch_assoc($res)){
                $prezzo = $prodotto["prezzo"];
                $totale = ($totale + $prezzo);
                $carrello[] = $prodotto;
            }
        }

        if(isset($_GET["p"])){
            $query = 'SELECT codice, prezzo FROM prodotto WHERE nome = "'.$_GET["p"].'"';
            $prod = mysqli_query($connection, $query);
            while($riga = mysqli_fetch_assoc($prod)){
                $query = 'DELETE from carrello where prodotto = "'.$riga["codice"].'"';
                mysqli_query($connection, $query);
                $totale = ($totale - $riga["prezzo"]);
            }
        }

        
    }

    mysqli_close($connection);
    $response["carrello"] = $carrello;
    $response["totale"] = $totale;
    echo json_encode($response);
     

?>