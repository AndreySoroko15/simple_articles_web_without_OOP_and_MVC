<?php require_once './db/connection.php';
$getLatestArticles = mysqli_query($connectDB,'SELECT title, p.id, name, date FROM posts p JOIN authors a ON p.author_id = a.id ORDER BY date DESC LIMIT 5'); ?>

<h1>Последние новости: </h1>
<?php 
while ($latestArticles = mysqli_fetch_assoc($getLatestArticles)) {
?>
    <div class="Post">
        <p> <?= date('d.m.Y H:i:s', strtotime($latestArticles['date'])) ?> </p>
            <h2><a href="views/pages/articles/article.php?id=<?=$latestArticles['id']?>"><?=$latestArticles['title'] ?> </a></h2>
        <p> <?= $latestArticles['name'] ?> </p>
    </div>
<?php 
}


