<?php
require('./components/header.php');
require('config.php');

$result = [];

$sql = $pdo->query("
    SELECT * FROM users
");


if ($sql->rowCount() > 0) {
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>

<main>
    <section>
        <a href="add_new_user.php">🟢Add a new user🟢</a>
    </section>
    <section>
        <table>
            <thead>
                <tr>
                    <th>CodUser</th>
                    <th>UserName</th>
                    <th>UserEmail</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <?php
            foreach ($result as $item) : ?>
                <tbody>
                    <tr>
                        <td><?= $item['CodUser'] ?></td>
                        <td><?= $item['Username'] ?></td>
                        <td style="text-transform: lowercase;"><?= $item['UserEmail'] ?></td>
                        <td>
                            <span class="<?= $item['Status'] == 'A' ? 'status-active' : 'status-inactive' ?>">
                                <?= $item['Status'] == 'A' ? 'Ativo' : 'Inativo' ?>
                            </span>
                        </td>
                        <td style="display: flex; gap:.4rem;">
                            <a href="./update_user.php?coduser=<?= $item['CodUser'] ?>" style="background-color: #FFF; 
                                padding: .4rem; 
                                border-radius: .4rem">
                                [ ✏️ ]
                            </a>
                            <a href="./delete_user.php?coduser=<?= $item['CodUser'] ?>" style="background-color: #FFF; 
                                padding: .4rem; 
                                border-radius: .4rem" onclick="return confirm('are you sure on delete this item?')">
                                [ 🚮 ]
                            </a>
                        </td>
                    </tr>

                </tbody>
            <?php endforeach; ?>
        </table>
    </section>
</main>