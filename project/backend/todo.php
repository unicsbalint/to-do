<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addTask'])) {
    $postData = [
        'user'=>$_SESSION['u_id'],
        'task'=>$_POST['task'],
        'date'=>date('Y/m/d')
    ];
    require_once 'dbFunctions.php';
    $query = 'INSERT INTO tasks(uid,task,deadline) VALUES (:user, :task, :date);';
    $params = [
        ':user'=>$postData['user'],
        ':task'=>$postData['task'],
        ':date'=>$postData['date']
    ];
    if (!executeDML($query, $params)) {
        echo "An error occured while saving the task.";
    }
}
$query = 'SELECT uid,task,deadline FROM tasks;';
require_once 'dbFunctions.php';
$tasks = GetList($query);
?>

<?php if(!IsUserLoggedIn()) : ?>
    <h1>Page access is forbidden!</h1>
<?php else: ?>
    <form method="post">
        <input type="text" class="to-do-input" name="task" placeholder="What should I do?">
        <button type="submit" class="to-do-button" name="addTask">Do it!</button>
    </form>

    <div class="to-do-container">
        <ul class="to-do-list">
            <?php if (count($tasks) <= 0): ?>
                <h3>There is no task.</h3>
            <?php else: ?>
                <?php$i=0; ?>
                <?php foreach ($tasks as $t): ?>
                    <?php$i++; ?>
                    <div class="todo">
                        <li class="toDoItem"><?=$t['task']?>
                        </li>
                        <button class="doneButton">Its Done!</button>
                        <button class="deleteButton">Delete</button>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <div class="nyomtatas">        
        <button  onclick="printContent()">Print my to-do</button>
    </div>
    <script src="project/frontend/script.js"></script>
<?php endif; ?>