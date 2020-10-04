<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send'])) {
    $postData = [
        'user'=>$_POST['user'],
        'issue'=>$_POST['issue'],
        'date'=>date('Y/m/d')
    ];
    require_once 'dbFunctions.php';
    $query = 'INSERT INTO bugreports(uid,report,date) VALUES (:user, :issue, :date);';
    $params = [
        ':user'=>$postData['user'],
        ':issue'=>$postData['issue'],
        ':date'=>$postData['date']
    ];
    if (executeDML($query, $params)) {
        header('Location: /to-do/index.php');
    }
}
?>

<form method="post">
    <div>
        <input type="text" name="user" placeholder="UserID">
    </div>
    <div>
        <textarea class="bugreport-issue" name="issue" cols="30" rows="10" placeholder="Issue" required>
        </textarea>
    </div>
    <div>
        <button type="submit" name="send">Send</button>
    </div>
</form>