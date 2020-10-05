<?php if(!IsUserLoggedIn()) : ?>
    <h1>Page access is forbidden!</h1>
<?php else: ?>  
    <?php 
        $query = "DELETE FROM users WHERE id = :id";
        $params = [':id' => $_SESSION['u_id']];
        require_once DATABASE_CONTROLLER;
        if(!executeDML($query, $params)) 
        {
            echo "Error!";
        }
        UserLogout();
    ?>
<?php endif; ?>
