<?php

    $name = '';
    $age = '';
    $noValue = '';

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(isset($_POST['name']) && !empty(trim($_POST['name']))){
            $name = htmlspecialchars($_POST['name']);
        } else {
            $noValue .= "❌ Name is not set <br />";
        }

        if(isset($_POST['age']) && !empty(trim($_POST['age']))){
            $age = htmlspecialchars($_POST['age']);
        }else {
            $noValue .= "❌ age is age set <br />";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Texting PHP</title>
    <link rel="stylesheet" href="./css/main.css" />
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" value="<?=htmlspecialchars($name)?>" placeholder="insert a name">
        <input type="text" name="age" value="<?=htmlspecialchars($age)?>" placeholder="insert your age">
        <button>Click me</button>
    </form>

    <div>
        <p>My name is: <?php echo $name ?> and am <?php echo $age?> old</p>
    </div>

    <div>
    <?php if(!empty($noValue)):?>
            <p><?php echo $noValue ?></p>
        <?php endif; ?>
    </div>
</body>
</html>