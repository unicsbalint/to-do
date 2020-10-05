<?php
    function IsUserLoggedIn() 
    {
        return $_SESSION != null && array_key_exists('u_id', $_SESSION) && is_numeric($_SESSION['u_id']);
    }

    function UserLogout()
    {
        session_unset();
        session_destroy();
        header('Location: index.php?P=home');
    }

    function UserRegister($username, $email_address, $user_password)
    {
        $query = "SELECT id FROM users email_address = :email_address";
        $params = [':email_address' => $email_address ];

        require_once DATABASE_CONTROLLER;
        $record = getRecord($query, $params);
        if(empty($record))
        {
            $query = "INSERT INTO users (username, email_address, user_password) VALUES (:username, :email_address, :user_password)";
            $params = [
                ':username' => $username,
                ':email_address' => $email_address,
                ':user_password' => sha1($user_password),
            ];

            if(executeDML($query, $params)) 
                header('Location: index.php?P=login');
        }
        return false;
    }

    function UserLogin($username, $password)
    {
        $query = 'SELECT id, username, email_address, user_password FROM users WHERE username = :username AND user_password = :user_password';
        $params = [
            ':username' => $username,
            ':user_password' => sha1($password)
        ];
        require_once DATABASE_CONTROLLER;
        $record = getRecord($query,$params);
        if(!empty($record)){
            $_SESSION['u_id'] = $record['id'];
            $_SESSION['username'] = $record['username'];
            $_SESSION['email_address'] = $record['email_address'];
            $_SESSION['user_password'] = $record['password'];

            header('Location: index.php?P=home');
        }
        return false;
    }

?>