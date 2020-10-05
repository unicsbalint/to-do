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
    <div class="reportbox">
        <label for="userID">UserID</label>
        <input type="text" name="user" id="userID" placeholder="UserID" value=<?=IsUserLoggedIn() ? $_SESSION['u_id'] : "0"; ?> disabled>
    </div>
    <div class="reportbox">
        <label for="issue">Issue</label>
        <textarea class="bugreport-issue" name="issue" id="issue" cols="30" rows="10" placeholder="Issue"></textarea>
    </div>
    <div class="reportbox">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" disabled value="<?=date('Y-m-d'); ?>">
    </div>
    <div>
        <button type="submit" name="send">Send</button>
    </div>
</form>