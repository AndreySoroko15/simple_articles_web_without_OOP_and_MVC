<?php
require_once '../../main/header.php';
require_once '../../../db/connection.php';

$categoriesCode = $_GET['code'];

$categories = mysqli_query($connectDB, "SELECT c.name, p.id, c.code, title, date, a.name FROM posts p JOIN categories c ON p.category_id = c.id JOIN authors a ON p.author_id = a.id WHERE c.code = '" . $categoriesCode . "'"); 

$categoryName = mysqli_fetch_assoc(mysqli_query($connectDB, 'SELECT name FROM categories WHERE code = "' . $categoriesCode . '"')); ?>
<section>
    <h1><?= $categoryName['name'] . ':'; ?></h1>
    <?php
    while ($articlesPreview = mysqli_fetch_assoc($categories)) {
    ?>
    <div class="Post">
        <p> <?=$articlesPreview['date'] ?> </p>
        <h2><a href="./article.php?id=<?=$articlesPreview['id']?>"><?=$articlesPreview['title'] ?> </a></h2>
        <p> <?=$articlesPreview['name'] ?> </p>
    </div>
    <?php
    }
    ?>
</section>