<?php require_once '../../main/header.php'; 
require_once '../../../db/connection.php';

$page_id = $_GET['id'];

$getArticle = mysqli_query($connectDB, "SELECT p.id, content, c.code, title, date, a.name FROM posts p JOIN categories c ON p.category_id = c.id JOIN authors a ON p.author_id = a.id WHERE p.id = $page_id;");

while ($article = mysqli_fetch_assoc($getArticle)) {
    ?>
    
    <section class="articlePage">
        <div class="articlesContent">
            <h1><?= $article['title'] ?></h1>
            <p><?= $article['content'] ?></p>
        </div>
        <div class='articlesInfo'>
            <p>Автор: <em><?= $article['name'] ?></em></p>
            <p>Дата публикации: <em><?= date('d.m.Y H:i:s', strtotime($article['date'])); ?></em></p>
        </div>
    </section>
    <?php
}

require_once '../../main/footer.html'; ?>