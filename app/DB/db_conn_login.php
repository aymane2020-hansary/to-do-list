<?php
    // Login Connection
    function getDB()
    {
        $db_host = "localhost";
        $db_name = "to_do_list";
        $db_user = "root";
        $db_pass = "";

    /*
        $db_host = "sql308.epizy.com";
        $db_name = "epiz_29385187_to_do_list";
        $db_user = "epiz_29385187";
        $db_pass = "nVgSSc2oOM";
    */
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        if(mysqli_connect_error()){
            echo mysqli_connect_error();
            exit;
        }
        return $conn;
    }
?>