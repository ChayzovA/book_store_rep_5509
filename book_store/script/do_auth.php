<?php
$user = "root";
$password = "";

$conn = new PDO ("mysql:host=localhost;dbname=bs", $user, $password);

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE `email` = :email AND `password` = :password";

$stmt=$conn->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);

$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($users)>0){
    session_start();
    $_SESSION['id'] = $users[0]['id'];
    $_SESSION['email'] = $users[0]['email'];
    $_SESSION['name'] = $users[0]['name'];    
    sleep(3);
    header("Location: ../index.php");
}
else{
    header("Location: ../auth.php");
}
?>