<?php 
    include './backend/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redmi Note App</title>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <main class="website-site position-center">
        <!-- search bar -->
        <header>
            <form action="" method="post" class="form-filed">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <label for="search">
                        <input type="search" id="search" name="search" placeholder="Search notes" class="search">
                    </label>
                    <button><i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </header>

        <!-- Notes Contents -->
        <article class="notes-container">
            <?php 
                $sql = "SELECT * FROM `notes`" ;
                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result)){
                    echo '
                        <section class="notes-contents">
                            <a href="update-todo.php?updateid='.$row['id'].'">
                                <aside class="notes">
                                    <h4 class="heading">'.htmlspecialchars($row['title']).'</h4>
                                    <p class="text">'.htmlspecialchars($row['text']).'</p>
                                    <p class="date">'.date("F j", strtotime($row['date'])).'</p>
                                </aside>
                                <aside class="notes-button-wrapper">
                                <a href="delete.php?deleteid='.$row['id'].'">
                                    <button class="btn">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </a>
                                </aside>
                            </a>
                        </section>
                    ';
                }
            ?>
        </article>

        <section class="create-btn-wrapper">
            <div class="create-btn-div">
                <a href="./create-todo.php">
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
        </section>
    </main>
</body>
</html>
