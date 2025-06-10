<?php
    require '../backend/connection.php';

    // Initialize error message
    $errorMessage = '';

    // Check if deleteid is set and is numeric
    if(isset($_GET['deleteId']) && is_numeric($_GET['deleteId'])){
        $id = intval($_GET['deleteId']); // Cast to integer to avoid SQL Injection

        // Prepare the DELETE statement
        $stmt = mysqli_prepare($conn, "DELETE FROM notes WHERE id = ?");

        if($stmt){
            mysqli_stmt_bind_param($stmt, "i", $id);
            if(mysqli_stmt_execute($stmt)){
                header('Location: /home');
                exit();
            } else {
                $errorMessage = "❌ Failed to delete todo. Please try again.";
            }

            mysqli_stmt_close($stmt);
        }else {
            $errorMessage = "❌ Invalid ID.";
        }
    }

    // If there's an error, show it
    if(!empty($errorMessage)){
        echo "<p>'.$errorMessage.'</p>";
    }
