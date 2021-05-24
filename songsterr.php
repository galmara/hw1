<?php

    if (isset($_GET['q'])){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://www.songsterr.com/a/ra/songs.json?pattern=" .urlencode($_GET['q']));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $tabs=curl_exec($curl);
        curl_close($curl);
        echo $tabs;
    }
?>