<?php
require('./components/header.php');
require('getRoute.php');

$userDao = new UserDAOMySQL($pdo);
$result = $userDao->findAll();
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
                        <td><?= $item->getCodUser(); ?></td>
                        <td><?= $item->getUsername(); ?></td>
                        <td style="text-transform: lowercase;"><?= $item->getUserEmail(); ?></td>
                        <td>
                            <span class="<?= $item->getStatus() == 'A' ? 'status-active' : 'status-inactive' ?>">
                                <?= $item->getStatus() == 'A' ? 'Ativo' : 'Inativo' ?>
                            </span>
                        </td>
                        <td style="display: flex; gap:.4rem;">
                            <a href="./update_user.php?coduser=<?= $item->getCodUser(); ?>" style="background-color: #FFF; 
                                padding: .4rem; 
                                border-radius: .4rem">
                                [ ✏️ ]
                            </a>
                            <a href="./delete_user.php?coduser=<?= $item->getCodUser(); ?>" style="background-color: #FFF; 
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