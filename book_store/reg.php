<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="head-wrapper">
            <div class="head-menu">
                <h1>Книжный магазин</h1>
                <a href="">Главная</a>
                <a href="">Корзина</a>
                <a href="">Регистрация</a>
                <a href="">Авторизация</a>
            </div>
        </div>
        
    </header>
    <main>
        <form action="script/do_reg.php" method="POST">
                <h2>Регистрация</h2>
                <label for="email">Email</label>
                <input name="email" type="text">
                <label for="name">Name</label>
                <input name="name" type="text">
                <label for="password">Password</label>
                <input name="password" type="password">
                <input type="submit" value="Зарегистрироваться">
            
        </form>
    </main>
    <footer>
        <p class="subscr">Подписаться на рассылку</p>
        <form action="">
            <input type="email" placeholder="введите Ваш email">
            <input type="button" value="Подписаться">
        </form>
    </footer>
</body>
</html>