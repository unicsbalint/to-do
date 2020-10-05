<?php session_start(); ?>
<?php require_once 'project/backend/config.php'; ?>
<?php require_once USER_MANAGER; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="project/frontend/style.css">
    <title>To-do</title>
</head>
<body>
    <div class="container-fluid">
        <header><?php include_once BACKEND_DIR.'header.php'; ?></header>
        <nav><?php require_once BACKEND_DIR.'nav.php'; ?></nav>
        <content><?php require_once BACKEND_DIR.'routing.php'; ?></content>
        <footer><?php include_once BACKEND_DIR.'footer.php'; ?></footer>
    </div>
</body>
</html>