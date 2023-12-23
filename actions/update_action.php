<?php
require('../config.php');

$coduser = filter_input(INPUT_GET, 'coduser');
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$status = $_POST['status'];

if ($_SERVER["REQUEST_METHOD"] == "POST" || "GET") {
    if ($coduser && $name && $email && $status) {
        $sql = $pdo->prepare("
            UPDATE users SET Username = :name,
            UserEmail = :email,
            status = :status
            WHERE CodUser = :coduser
        ");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':coduser', $coduser);
        $sql->bindValue(':status', $status);
        $sql->execute();

        header('Location: ../index.php');
        exit;
    } else {
        header('Location: ../index.php');
        exit;
    }
}
