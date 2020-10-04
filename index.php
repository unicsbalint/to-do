<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="project/frontend/style.css">
    <title>To-do</title>
</head>
<body>
    <a class="bugreport-button" href="project/backend/bugreport.php">Report bug</a>
    <div class="userManageButton">
        <a href="project/backend/register.php">Register</a>
        <a href="project/backend/login.php">Login</a>
    </div>
    <h1>NOMAD's To-Do</h1>
    <header>
    <form>
        <input type="text" class="to-do-input" placeholder="What should I do?">
        <button class="to-do-button" type="submit">Do it!</button>
    </form>
    </header>
    <div class="to-do-container">
        <ul class="to-do-list">
           
        </ul>
    </div>
    <div class="nyomtatas">
        <button  onclick="printContent()">Print my to-do</button>
    </div>
    <script src="project/frontend/script.js"></script>
</body>
</html>