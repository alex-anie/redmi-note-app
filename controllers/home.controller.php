<?php 
    include '../backend/connection.php';

    $start = 0;
    $rows_per_page = 4;

    // get the total nr of rows
    $records = mysqli_query($conn,'SELECT * FROM notes');
    $nr_of_rows = $records->num_rows;

    // Calculating the nr of pages
    $pages = ceil($nr_of_rows / $rows_per_page);

    if(isset($_GET['page-nr'])){
        $page = $_GET['page-nr'] - 1;
        $start = $page * $rows_per_page;
    }

    // $sql = "SELECT * FROM `notes`" ;
    $sql = "SELECT * FROM `notes` ORDER BY `id` DESC LIMIT $start, $rows_per_page";
    $result = mysqli_query($conn, $sql);
