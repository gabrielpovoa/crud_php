<?php
require('./components/header.php');
?>

<form action="./actions/add_action.php" method="POST">
    <h1>add a new user</h1>
    <label for="name">
        Username
        <input type="text" name="name" id="name" required>
    </label>
    <label for="email">
        Email
        <input type="email" name="email" id="email" required>
    </label>
    <label for="status">
        Grab your currently status
        <select id="status" name="status" required>
            <option value="NONE">SELECT</option>
            <option value="A">Active</option>
            <option value="I">Inactive</option>
        </select>
    </label>
    <input type="submit" value="Submit">

</form>