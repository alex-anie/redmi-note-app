<?php require '../controllers/home.controller.php';?>
<?php require '../controllers/search.controller.php'?>
<?php if($queryResult > 0): ?>
    <?php while($note = mysqli_fetch_assoc($result)): ?>
            <article class="notes-container">
            <section class="notes-contents">
                <a href="/update?updateId=<?=$note['id']?>">
                    <aside class="notes">
                        <h4 class="heading"><?=htmlspecialchars($note['title'])?></h4>
                        <p class="text"><?=htmlspecialchars($note['text'])?></p>
                        <p class="text"><?=htmlspecialchars(date_format(date_create($note['date']), 'Y/M/l'))?></p>
                    </aside>
                    <aside class="notes-button-wrapper">
                        <a href="/delete?deleteId=<?=$note['id']?>">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2024 Fonticons, Inc. --><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                            </button>
                        </a>
                    </aside>
                </a>
            </section>
        </article>
        <?php endwhile; ?>
        
    <?php else: ?>
        <article class="notes-container">
            <h1>Not search Found for <span class="search-not-found-text">'<?= $_POST['search']?>'</span></h1>
        </article>
<?php endif; ?>