<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="style.css">
    <title>Главная</title>
</head>
<body>
    <?php
    session_start();
    
    $user = "root";
    $password = "";

    $conn = new PDO("mysql:host=localhost;dbname=bs", $user, $password);

    $sql = "SELECT * FROM `book`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $products = $stmt->fetchALL(PDO::FETCH_ASSOC);
    ?>
    <header>
        <div class="head-wrapper">
            <div class="head-menu">
                <h1>Книжный магазин</h1>
                <a href="">Главная</a>
                <a href="cart.php">Корзина</a>
                <a href="reg.php">Регистрация</a>
                <a href="auth.php">Авторизация</a>
                <?php
                if(isset($_SESSION['id'])){
                $email = $_SESSION['email'];
                $name = $_SESSION['name'];
                echo "<a href='#'>$name</a>";
                } ?>
            </div>
        </div>
        <div class="sub_head-wrapper">
            <h2>Главная</h2>
        </div>
    </header>
    <main>
        <div class="product-wrapper">
            <?php
             for ($i=0; $i<count($products); $i++){ 
                $id = $products[$i]['id'];
                ?>
                <div class="product">
                    <h2><?php echo $products[$i]['title']?></h2>
                    <h3><?php echo $products[$i]['price']?></h3>
                    <img src="<?php echo $products[$i]['img']?>"/>
                    <div class="button">
                        <?php echo "<a href='script/add_product.php?id=$id'>🛒</a>";?>
                        <?php echo "<a href='script/add_fav.php?id=$id'>❤️</a>";?>
                    </div>
                </div>           
            <?php } ?>
        </div>
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