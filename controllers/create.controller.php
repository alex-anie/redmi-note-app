<?php
    require '../backend/connection.php';

    $title = '';
    $text = '';
    $sucessMessage = '';
    $errorMessage = '';

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        // Validate inputs
        if(!empty($_POST['title']) && !empty($_POST['text'])){
            // Clean the inputs
            $title = trim($_POST['title']);
            $text = trim($_POST['text']);

            // Insert into database using prepared statements
            $stmt = mysqli_prepare($conn, "INSERT INTO notes (title, text, date) VALUES(?, ?, CURRENT_TIMESTAMP)");
                if($stmt){
                    mysqli_stmt_bind_param($stmt, "ss", $title, $text);
                        if(mysqli_stmt_execute($stmt)){
                            // $sucessMessage = "✅Todo created successful!";
                            header('location:/home');
                            // require '/home';
                        }else {
                            $errorMessage = "❌ Failed to create todo. Please try again.";
                        }
                    mysqli_stmt_close($stmt);
                } else {
                    $errorMessage = "❌ Failed to prepare the SQL statement.";
                } 
        }else {
            $errorMessage = "❌ Please fill in both the title and description.";
        }
    }
