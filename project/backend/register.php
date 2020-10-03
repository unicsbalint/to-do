<?php
    require_once 'userManager.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        $postData = [
            'uname' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'confirmpassword' => $_POST['confirmpassword']
        ];
    }
    if (empty($postData['uname']) || empty($postData['email']) || empty($postData['password']) || empty($postData['confirmpassword'])) {
        echo("Missing data!");
    }
    else if ($postData['password'] != $postData['confirmpassword']) {
        echo("Password does not match!");
    }
    else if (strlen($postData['password']) < 8) {
        echo "Password too short! Your password must be at least 8 characters!";
    }
    else if (!registerUser($postData['uname'],$postData['email'],$postData['password'])) {
        echo("Registration failed!");
    }


?>

<form method="post">
    <div>
        <input type="text" class="registerUser" name="username" placeholder="Username">
    </div>

    <div>
        <input type="email" class="registerUser" name="email" placeholder="Email">
    </div>

    <div>
        <input type="password" class="registerUser" name="password" placeholder="Password">
    </div>

    <div>
        <input type="password" class="registerUser" name="confirmpassword" placeholder="Confirm password">
    </div>

    <div>
        <button type="submit" name="register">Register</button>
    </div>
</form>