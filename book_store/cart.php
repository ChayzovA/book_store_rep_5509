<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="style.css">
    <title>Корзина</title>
</head>
<body>
<header>
        <div class="head-wrapper">
            <div class="head-menu">
                <h1>Книжный магазин</h1>
                <a href="index.php">Главная</a>
                <a href="">Корзина</a>
                <a href="">Регистрация</a>
                <a href="">Авторизация</a>
            </div>
        </div>
        <div class="sub_head-wrapper">
            <h2>Корзина</h2>
        </div>
    </header>
    <main class="cart-main">
    <?php
    session_start();
    if(isset($_SESSION['busket'])){
        $busket = $_SESSION['busket'];
    }
    else{
        $busket = [];
    }

    $user='root';
    $password = '';

    $conn = new PDO("mysql:host=localhost;dbname=bs", $user, $password);

    //print_r($busket);
    $busket = array_count_values($busket);
    //print_r($busket);
    ?> 
    <table>
    <?php
    if(count($busket)>0){
        ?>
        <tr>
            <th>Название</th>
            <th>Количество</th>
            <th>Цена за шт.</th>
            <th>Общая сумма</th>
        </tr>
    <?php
    }
    ?>
                
    <?php
    foreach ($busket as $id => $count){
        //print_r($count);
        $sql = "SELECT * FROM `book` WHERE `id` = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        $title = $product['title'];
        $price = $product['price'];
        $sum = $count * $price;
        //print_r($product);?> 
        <tr>
                <td><?php echo $title;?></td>
                <td><?php echo $count;?></td>
                <td><?php echo $price;?></td>
                <td><?php echo $sum;?></td>
        </tr> 
    <?php    
    }
    ?>
    </table>
    <?php 
    if(count($busket)>0){
        ?>
        <a id="buy" href="script/buy.php">Купить</a>
    <?php
    }
    else{
        echo "Купите книгу";
    }
    ?>
    </main>
    <div></div>
    <!-- <script>
    document.getElementById("buy").addEventListener("click", function() {
        alert ("Ваша покупка успешно добавленна");
    });
</script> -->
</body>
</html>
