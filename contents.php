<?php
    require "db_config.php";


    $connection = mysqli_connect($dbconfig["host"],$dbconfig["user"], $dbconfig["password"], $dbconfig["name"]) or die("Errore" . mysqli_connect_error());
    //Inizializzazione array dei prodotti
    $prodotti = array();

    $query = "SELECT * FROM prodotto";

    if(isset($_GET["q"])){
        $query = $query . ' where nome = "'.$_GET["q"].'"'; 
    }

    $res = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($res)){
        $prodotti[]=$row;
    }

    mysqli_close($connection);
    echo json_encode($prodotti);

?>