<?php

function databaseConnect() {
    $connection = new PDO('mysql:host=localhost;dbname=todo;','root','');
    $connection->exec("SET NAMES 'utf8'");
    return $connection;
}

function getRecord($queryString, $queryParams = []) {
    $connection = databaseConnect();
    $statement = $connection->prepare($queryString);
    $success = $statement->execute($queryParams);
    $result = $success ? $statement->fetch(PDO::FETCH_ASSOC) : [];
    $statement->closeCursor();
    $connection = null;
    return $result;
}

function executeDML($queryString, $queryParams = []) {
    $connection = databaseConnect();
    $statement = $connection->prepare($queryString);
    $success = $statement->execute($queryParams);
    $statement->closeCursor();
    $connection = null;
    return $success;
}
?>