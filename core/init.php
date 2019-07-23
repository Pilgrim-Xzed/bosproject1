<?php
    $server = "us-cdbr-iron-east-02.cleardb.net";
    $user = "b97ab0c9e990c2";
    $key = "d95a98f2";
    $db = "heroku_581444eed7c0c40";





    $con = mysqli_connect($server,$user,$key,$db) or die("Failed to connect to DB");
    define('BASEURL', $_SERVER['DOCUMENT_ROOT']);
    session_start();
?>
