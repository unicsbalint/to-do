<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) 
    {
        $postData = [
            'username' => $_POST['username'],
            'user_password' => $_POST['user_password']
        ];

        if(empty($postData['username']) || empty($postData['user_password'])) 
        {
            echo "Username or password cannot be empty !";
        } 
        else if(!UserLogin($postData['username'], $postData['user_password'])) 
        {
            echo "Username or password is incorrect";
        }

        $postData['user_password'] = "";
    }
?>


<form method="post">
  <div class="form-group">
    <label for="loginUsername">Username</label>
    <input type="username" class="form-control" id="loginUsername" aria-describedby="usernameHelp" name="username" value="<?= isset($postData) ? $postData['username'] : '';?>">
  </div>
  <div class="form-group">
    <label for="loginPassword">Password</label>
    <input type="password" class="form-control" id="loginPassword" name="user_password" value="">
  </div>
  <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>