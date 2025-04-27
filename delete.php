<?php
    include 'backend/connection.php';

    // Initialize error message
    $errorMessage = '';

    // Check if deleteid is set and is numeric
    if(isset($_GET['deleteid']) && is_numeric($_GET['deleteid'])){
        $id = intval($_GET['deleteid']); // Cast to integer to avoid SQL Injection

        // Prepare the DELETE statement
        $stmt = mysqli_prepare($conn, "DELETE FROM notes WHERE id = ?");

        if($stmt){
            mysqli_stmt_bind_param($stmt, "i", $id);
            if(mysqli_stmt_execute($stmt)){
                header('Location: index.php');
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
?>