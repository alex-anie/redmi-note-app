<?php
    require '../backend/connection.php';

    // Initialize variable
    $title = '';
    $text = '';
    $errorMessage = '';

    //Get the ID from the query parameter safely
    if(isset($_GET['updateId']) && is_numeric($_GET['updateId'])){
        $id = intval($_GET['updateId']); // always cast to integer to be safe

        // Fetch the existing note
        $stmt = mysqli_prepare($conn, "SELECT title, text FROM notes WHERE id = ?");

        if($stmt){
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $title, $text);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);
        }else {
            die("Failed to prepare SELECT statement: " . mysqli_error($conn));
        }

        // Handle from submission
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $newTitle = trim($_POST['title']);
            $newText = trim($_POST['text']);

            if(!empty($newTitle) && !empty($newText)){
                $updateStmt = mysqli_prepare($conn, "UPDATE notes SET title = ?, text = ? WHERE id = ?");

                if($updateStmt){
                    mysqli_stmt_bind_param($updateStmt, "ssi", $newTitle, $newText, $id);
                    if(mysqli_stmt_execute($updateStmt)){
                        header('Location:/home');
                        exit();
                    }else {
                        $errorMessage = "❌ Failed to update todo. Please try again.";
                    }
                    mysqli_stmt_close($updateStmt);
                }else {
                    $errorMessage = "❌ Failed to prepare UPDATE statement.";
                }
            }else {
                $errorMessage = "❌ Please fill in both fields.";
            }
        }
    }
