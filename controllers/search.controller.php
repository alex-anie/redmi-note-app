<?php
    require '../backend/connection.php';

    //Get the search query from the URL
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';

    $results = [];

    if($search !== ''){
        $like = "%" . $mysqli->real_escape_string($search) . "%";
        $stmt = $mysqli->prepare("SELECT * FROM notes WHERE title LIKE ? OR text LIKE ?");
        $stmt->bind_param("ss", $like, $like);
        $stmt->execute();
        $result = $stmt->get_result();
        
        while($row = $result->fetch_assoc){
            $results[] = $row;
        };

        $stmt->close();
    }
