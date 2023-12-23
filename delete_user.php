<?php
require('config.php');

$coduser = filter_input(INPUT_GET, 'coduser');

if ($coduser) {
    $sql = $pdo->prepare("
    DELETE FROM users where CodUser = :coduser
    ");
    $sql->bindValue(':coduser', $coduser);
    $sql->execute();
};
header('Location: ./index.php');
exit;
