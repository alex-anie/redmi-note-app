<?php
    include 'backend/connection.php';

    // Initialize variable
    $title = '';
    $text = '';
    $errorMessage = '';

    //Get the ID from the query parameter safely
    if(isset($_GET['updateid']) && is_numeric($_GET['updateid'])){
        $id = intval($_GET['updateid']); // always cast to integer to be safe

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
                        header('Location: index.php');
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create todo</title>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <main class="website-site">
        <article>
            <?php if(!empty($errorMessage)): ?>
                <p><?php echo $errorMessage?></p>
            <?php endif; ?>

            <form action="" method="post">
                <div class="input-title">
                    <label class="heading-label">What are you doing today?</label>
                    <input type="text" id="title" name="title" placeholder="Title..." value="<?php echo htmlspecialchars($title); ?>" required>
                </div>
                <div class="text-body">
                    <textarea name="text" id="text" rows="15" cols="33" placeholder="Create a Todo..." required><?php echo htmlspecialchars($text);?></textarea>
                </div>

                <button class="btn-submit" type="submit">
                    Update
                </button>
            </form>
        </article>
    </main>
</body>
</html>