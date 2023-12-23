<?php
require('./components/header.php');
require('./config.php');

$info = [];
$CodUser = filter_input(INPUT_GET, 'coduser');

if ($CodUser) {
    $sql = $pdo->prepare("SELECT * FROM users WHERE CodUser = :coduser");
    $sql->bindValue(':coduser', $CodUser);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $info = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header('Location: index.php');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}

?>

<form action="./actions/update_action.php?coduser=<?= $info['CodUser']; ?>" method="POST">
    <!-- <input 
        type="text" 
        name="coduser" 
        id="coduser" 
        hidden
        value="<?= $info['CodUser']; ?>"
    /> -->
    <h1>Update User <span class="update"><?= 'Registry' . ' - ' . $info['CodUser']; ?></span> </h1>
    <label for="name">
        Username
        <input type="text" name="name" id="name" value="<?= $info['Username']; ?>" required />
    </label>
    <label for="email">
        Email
        <input type="email" name="email" id="email" value="<?= $info['UserEmail']; ?>" required />
    </label>
    <label for="status">
        Currently status
        <select id="status" name="status">
            <option 
                value="I" 
                <?= $info['Status'] == 'I' ? 'selected' : ''; ?>>
                Inativo
            </option>
            <option 
                value="A" 
                <?= $info['Status'] == 'A' ? 'selected' : ''; ?>>
                Ativo
            </option>
        </select>
    </label>
    <input type="submit" value="Update Data">

</form>