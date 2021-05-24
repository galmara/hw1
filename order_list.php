<?php
    require "db_config.php";

    session_start();
    $connection = mysqli_connect($dbconfig["host"],$dbconfig["user"], $dbconfig["password"], $dbconfig["name"]) or die("Errore" . mysqli_connect_error());
    $ordini = array();


    if(isset($_SESSION["id"])){
        $query = "SELECT * FROM ordine WHERE cliente = " . $_SESSION["id"]; 
        $res = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($res)){
            $ordini[]=$row;
        }

        $totale = 0;
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $carrello = "SELECT prodotto FROM carrello WHERE cliente = " . $_SESSION["id"]; 
            $ris = mysqli_query($connection, $carrello);
            while($riga = mysqli_fetch_assoc($ris)){
                $prodotto = 'SELECT prezzo FROM prodotto WHERE codice = "'.$riga["prodotto"].'"';
                $prezzi = mysqli_query($connection, $prodotto);
                while($x = mysqli_fetch_assoc($prezzi)){
                    $prezzo = $x["prezzo"];
                    $totale = ($totale + $prezzo); //prezzo totale del carrello e quindi anche dell'ordine
                }
            }
            if($totale < 200){
                $spedizione = 19.99;
                $totale = ($totale + $spedizione);
            }
            $inserimento = 'INSERT INTO ordine(totale, cliente, data) VALUES ("'.$totale.'", '.$_SESSION['id'].', "'.date('Y/m/d').'")';
            $ordine = mysqli_query($connection, $inserimento);
            $eliminazione = 'DELETE FROM carrello WHERE cliente='.$_SESSION["id"];
            $eliminato = mysqli_query($connection, $eliminazione);
        }
    }

    mysqli_close($connection);
    echo json_encode($ordini);

?>