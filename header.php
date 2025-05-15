<header>
        <div class="popup">
        <a href="index.php">Главная</a>
        <?php if ($user_id): ?>
        <a id="show_add_photo" href="#">Фото</a>
        <?php endif; ?>
        <a href="#">Поиск</a>
        <a href="user.php">Профиль</a>
        </div>
        <div class="micon">
            <img src="./img/free-icon-menu-12144427.png" alt="">
        </div>
        <div class="close_popup">
            <img src="./img/free-icon-cancel-7903553.png" alt="">
        </div>
        <?php if ($user_id): ?>
            <a href="logout.php">Выйти</a>
        <?php endif; ?>
</header>