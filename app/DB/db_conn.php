<?php

    // Index Connection
    $sName = "localhost";
    $uName = "root";
    $pass = "";
    $db_name = "to_do_list";

/*
    $sName = "sql308.epizy.com";
    $uName = "epiz_29385187";
    $pass = "nVgSSc2oOM";
    $db_name = "epiz_29385187_to_do_list";
*/

    try {
        $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(DPOException $e){
        echo 'Connection Failed : ' . $e->getMessage();
    }
?>