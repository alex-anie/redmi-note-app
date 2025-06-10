<?php 
    include '../backend/connection.php';


    $sql = "SELECT * FROM `notes`" ;
    $result = mysqli_query($conn, $sql);
    
    // while($row = mysqli_fetch_assoc($result)){
    //     return $row;
    // };