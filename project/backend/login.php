<?php 
    require_once 'userManager.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $postData = [
            'uname' => $_POST['username'],
            'password' => $_POST['password']
        ];
        if (empty($postData['uname']) || empty($postData['password'])) {
            echo("Missing data!");
        } else if (!loginUser($postData['uname'],$postData['password'])) {
            echo("Incorrect email or password!");
        }
    }
?>


<form method="POST">

    <input type="text" class="loginUser" name="username" placeholder="Username">
    <input type="password" class="loginUser" name="password" placeholder="Password">

    <button type="submit" name="login">Login</button>
</form>