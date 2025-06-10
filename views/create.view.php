<?php require '../controllers/create.controller.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create todo</title>
</head>
<body>
    <main class="website-site">
        <article>
            <?php if(!empty($sucessMessage)): ?>
                <p class="success-message">
                    <?= htmlspecialchars($sucessMessage); ?>
                </p>
            <?php endif; ?>

            <?php if(!empty($errorMessage)): ?>
                <p class="error-message">
                    <?= htmlspecialchars($errorMessage); ?>
                </p>
            <?php endif; ?>

            <form action="" method="post">
                <div class="input-title">
                    <label class="heading-label">What are you doing today?</label>
                    <input type="text" id="title" name="title" placeholder="Title..." value="<?= htmlspecialchars($title); ?>">
                </div>
                <div class="text-body">
                    <textarea name="text" id="text" rows="15" cols="33" placeholder="Create a Todo..."><?= htmlspecialchars($text);?></textarea>
                </div>

                <button class="btn-submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2024 Fonticons, Inc. --><path d="M16.1 260.2c-22.6 12.9-20.5 47.3 3.6 57.3L160 376l0 103.3c0 18.1 14.6 32.7 32.7 32.7c9.7 0 18.9-4.3 25.1-11.8l62-74.3 123.9 51.6c18.9 7.9 40.8-4.5 43.9-24.7l64-416c1.9-12.1-3.4-24.3-13.5-31.2s-23.3-7.5-34-1.4l-448 256zm52.1 25.5L409.7 90.6 190.1 336l1.2 1L68.2 285.7zM403.3 425.4L236.7 355.9 450.8 116.6 403.3 425.4z"/></svg>
                    Create
                </button>
            </form>

        </article>
    </main>
</body>
</html>