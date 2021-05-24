<?php
    require "db_config.php";

    $connection = mysqli_connect($dbconfig["host"],$dbconfig["user"], $dbconfig["password"], $dbconfig["name"]) or die("Errore" . mysqli_connect_error());
    $clienti = array();

    if(isset($_GET["q"])){
       $query = 'SELECT * FROM cliente where mail = "'.$_GET["q"].'"';
    }

    $res = mysqli_query($connection, $query);

    if(mysqli_num_rows($res)>0){
        $clienti["found"]=1;
    }
    else $clienti["found"]=0;

    mysqli_close($connection);
    echo json_encode($clienti);

?>