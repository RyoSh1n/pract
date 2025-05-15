<?php 
    session_start();
    $user_id = $_SESSION['user_id'] ?? false;
    $photo_id = intval($_GET["id"]);
    require "./vendor/autoload.php";
    $db = new \Photos\DB();
    $photo = $db->get_photo_by_id($photo_id);
    $comments = $db->get_photo_comments($photo_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Фото</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <?php include "header.php"; ?>
<div id="image">
    <img src="<?= $photo['Image']?>" alt="">
    <h1><?= $photo['Text'] ?></h1>
    <p>Aвтор: <?= $photo['Name'] ?></p>

</div>
<div class="comments"> 
    <div class="form">
        <textarea name="" id="text" rows="5">Добавить комментарий</textarea>
        <button id="add_comment">Добавить</button>
    </div>
<h2>Комментарии:</h2>
    <?php foreach ($comments as $comment): ?>
        <div class="comment">
            <p class="author"><?= $comment['Name'] ?></p>
            <p class="text"><?= $comment['Text'] ?></p>
            <p class="date"><?= $comment['Post_date'] ?></p>
        </div>
    <?php endforeach; ?>
</div>

<script src="image.js"></script>

</body>
</html>