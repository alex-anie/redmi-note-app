<?php
    include 'backend/connection.php';

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
                            header('location: index.php');
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
            <?php if(!empty($sucessMessage)): ?>
                <p class="success-message">
                    <?php echo htmlspecialchars($sucessMessage); ?>
                </p>
            <?php endif; ?>

            <?php if(!empty($errorMessage)): ?>
                <p class="error-message">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </p>
            <?php endif; ?>

            <form action="" method="post">
                <div class="input-title">
                    <label class="heading-label">What are you doing today?</label>
                    <input type="text" id="title" name="title" placeholder="Title..." value="<?php echo htmlspecialchars($title); ?>" required>
                </div>
                <div class="text-body">
                    <textarea name="text" id="text" rows="15" cols="33" placeholder="Create a Todo..." required>
                        <?php echo htmlspecialchars($text);?>
                    </textarea>
                </div>

                <button class="btn-submit">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>

        </article>
    </main>
</body>
</html>