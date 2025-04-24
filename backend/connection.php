<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "redmi-note-db";

    try{
        $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
        mysqli_set_charset($conn, 'utf8mb4');
    }catch(mysqli_sql_exception $e){
        die("Connection Failed" .  $e-> getMessage());
    };
?>