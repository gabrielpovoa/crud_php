<?php
require('../config.php');

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$status = $_POST['status'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($name && $email && $status) {

        $sql = $pdo->prepare("SELECT * from users where UserEmail = :email");
        $sql->bindValue(':email', $email,);
        $sql->execute();

        if ($sql->rowCount() == 0) {
            $sql = $pdo->prepare("INSERT INTO users (Username,UserEmail,Status) VALUES (:name, :email, :status) ");
            $sql->bindValue(':name', $name);
            $sql->bindValue(':email', $email,);
            $sql->bindValue(':status', $status);
            $sql->execute();
            header('Location: ../index.php');
            exit;
        } else {
            header('Location: ../add_new_user.php');
            exit;
        }
    } else {
        header('Location: ../add_new_user.php');
        exit;
    }
}
