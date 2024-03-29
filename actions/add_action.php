<?php
require('../config.php');
require('../dao/UserDAOMySQL.php');

$addNewUserFilePath = '../add_new_user.php';  // Corrected file path
$home = '../index.php';  // Corrected file path

$userDao = new UserDAOMySQL($pdo);

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$status = $_POST['status'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($name && $email && $status) {
        if ($userDao->findByEmail($email) === false) {
            $newUser = new User;
            $newUser->setUsername($name);
            $newUser->setUserEmail($email);
            $newUser->setStatus($status);

            $userDao->Add($newUser);
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
