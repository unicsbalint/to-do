<hr>

<ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link <?=$_GET['P'] == 'home' ? 'active' : ''?>" data-toggle="tab" href="index.php?P=home">Home</a>
        </li>
        <?php if(!IsUserLoggedIn()) : ?>
            <li class="nav-item">
                <a class="nav-link <?=$_GET['P'] == 'login' ? 'active' : ''?>" data-toggle="tab" href="index.php?P=login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$_GET['P'] == 'registration' ? 'active' : ''?>" data-toggle="tab" href="index.php?P=registration">Registration</a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link <?=$_GET['P'] == 'todo' ? 'active' : ''?>" data-toggle="tab" href="index.php?P=todo">TO-DO List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"href="index.php?P=delete">Delete Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"href="index.php?P=logout">Logout</a>
            </li>
        <?php endif; ?>
    </ul>

<hr>