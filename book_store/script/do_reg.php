<?php
$user= "root";
$password = "";

$conn = new PDO("mysql:host=localhost;dbname=bs", $user, $password);

$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE `email` = :email";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email);

$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($users) > 0){
    sleep(3);
    header("Location: ../reg.php");
}

else{
    $sql = "INSERT INTO `users` (email, name, password) VALUE (:email, :name, :password)";

    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password', $password);

    $stmt->execute();

    sleep(3);
    header("Location: ../auth.php");
}

?>