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
    }
?>