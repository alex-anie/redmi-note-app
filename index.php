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
            <section class="notes-contents">
                <aside class="notes">
                    <h4 class="heading">Food items</h4>
                    <p class="text">Bread and beans</p>
                    <p class="date">April 16</p>
                </aside>
                <aside class="notes-button-wrapper">
                    <button class="btn">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </aside>
            </section>
        </article>
    </main>
</body>
</html>
