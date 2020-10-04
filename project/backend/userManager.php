<?php
    function registerUser($username, $email, $password) {
        $query = 'SELECT id FROM users WHERE username = :username';
        $params = [
            ':username' => $username
        ];
        require_once 'dbFunctions.php';
        $record = getRecord($query,$params);
        if (empty($record)) {
            $query = 'INSERT INTO users(username, email, password) VALUES (:username, :email, :password)';
            $params = [
                ':username' => $username,
                ':email' => $email,
                ':password' => sha1($password)
            ];
            if (executeDML($query,$params)) {
                header('Location: /to-do/index.php');
            }
        }
        return false;
    }

    function loginUser($username, $password)
    {
        $query = 'SELECT id, username, email, password FROM users WHERE username = :username AND password = :password';
        $params = [
            ':username' => $username,
            ':password' => sha1($password)
        ];
        require_once 'dbFunctions.php';
        $record = getRecord($query,$params);
        if(!empty($record)){
            $_SESSION['id'] = $record['id'];
            $_SESSION['username'] = $record['username'];
            $_SESSION['email'] = $record['email'];
            $_SESSION['password'] = $record['password'];

            header('Location: /to-do/index.php');
        }
        return false;
    }

?>