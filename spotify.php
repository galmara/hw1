<?php

    $last_releases = 5;
    $client_id= "250016e3bb174f6397d4785e40da9d11";
    $client_secret = "a0731c3994644a1c8093d254a418113d";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token"); // fetch("https://accounts.spotify.com/api/token"
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($curl, CURLOPT_POST, 1); //method: "post"
    curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials"); //body:"grant_type=client_credentials",
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/x-www-form-urlencoded','Authorization: Basic '.base64_encode($client_id.':'.$client_secret)));
    $res = curl_exec($curl);
    $token = json_decode($res) -> access_token;
    curl_close($curl);

    $url = 'https://api.spotify.com/v1/browse/new-releases?limit=5';
    $curl =  curl_init();
    curl_setopt($curl, CURLOPT_URL, $url); //fetch("https://api.spotify.com/v1/browse/new-releases?limit=" + last_releases,
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' .$token));
    $releases = curl_exec($curl);
    print($releases);
    curl_close($curl);
    

?>