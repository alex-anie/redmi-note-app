<?php require '../controllers/update.controller.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update todo</title>
    <!-- <link rel="stylesheet" href="css/main.css" /> -->
</head>
<body>
    <main class="website-site">
        <article>
            <?php if(!empty($errorMessage)): ?>
                <p><?= $errorMessage?></p>
            <?php endif; ?>

            <form action="" method="post">
                <div class="input-title">
                    <label class="heading-label">What are you doing today?</label>
                    <input type="text" id="title" name="title" placeholder="Title..." value="<?= htmlspecialchars($title); ?>">
                </div>
                <div class="text-body">
                    <textarea name="text" id="text" rows="15" cols="33" placeholder="Create a Todo..."><?= htmlspecialchars($text);?></textarea>
                </div>

                <button class="btn-submit" type="submit">
                    Update
                </button>
            </form>
        </article>
    </main>
</body>
</html>