<?php if(!IsUserLoggedIn()) : ?>
	<center><h1>This is the home page for everybody.</h1></center>
<?php else :?>
    <center><h1> Welcome back <?=$_SESSION['username'].' !'?></h1></center>
<?php endif; ?>