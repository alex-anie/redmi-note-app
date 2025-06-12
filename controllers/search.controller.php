<?php
    require '../backend/connection.php';

    if(isset($_POST['submit-search'])){
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM notes WHERE title LIKE '%$search%' OR text LIKE '%$search%' OR date LIKE '%$search%'";

        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

}