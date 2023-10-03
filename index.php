<?php  
require_once './db/connection.php';
$getTableCategories = mysqli_query($connectDB, 'SELECT * FROM categories');

require_once './views/main/header.php'; ?>

    <section class="categoriesList">
        <h1>Выберете интересующую вас категорию</h1>
        <ul>
            <?php 
                while ($categoriesNav = mysqli_fetch_assoc($getTableCategories)) {
            ?>
                <li>
                    <a href="./views/pages/articles/categoryPage.php?code=<?=$categoriesNav['code']?>"><?=$categoriesNav['name']?></a>
                </li>
            <?php
                }
            ?>
        </ul>
    </section>
    <section class="latestArticles">
        <?php  require_once './views/pages/articles/latestArticles.php' ?>
    </section>

<?php  require_once './views/main/footer.html'; ?>
