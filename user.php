<?php
    session_start();
    $user_id = $_SESSION['user_id'] ?? false;
    require "./vendor/autoload.php";  
    $db = new \Photos\DB();
    if ($user_id) {$data = $db->get_user_photos($user_id);}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>

    <?php include 'header.php' ?>

    <?php if ($user_id): ?>
    <h2 id="post">Галерея</h2>
    <div id="grid">
        <?php foreach ($data as $photo): ?>
            <?= (new Photos\Photo($photo["id"], $photo["Image"], $photo["Text"]))->get_html() ?>
        <?php endforeach; ?>
    </div>

    <?php include 'add_form.php' ?> 
    
    <?php else: ?>
        <div class="form">
            <form action="login.php" method="POST">
                <h2>Авторизация</h2>
                <?php if (isset($_GET['error'])): ?>
                    <p class="error">Неверный логин или пароль</p>
                <?php endif; ?>
                <input type="text" name="login" placeholder="Логин">
                <input type="password" name="password" placeholder="Пароль">
                <br><button type="submit">Войти</button>
            </form>
        </div>

        <div class="form">
            <form action="signup.php" method="POST">
                <h2>Регистрация</h2>
                <?php if (isset($_GET['sign_error'])): ?>
                    <p class="error">Этот Логин уже занят!</p>
                <?php endif; ?>
                <?php if (isset($_GET['sign_success'])): ?>
                    <p class="success">Регистрация завершена!</p>
                <?php endif; ?>
                <input type="text" name="login" placeholder="Логин">
                <input type="password" name="password" placeholder="Пароль">
                <br><button type="submit">Войти</button>
            </form>
        </div>
        
    <?php endif; ?>

    <script src="script.js">    </script>
</body>
</html>