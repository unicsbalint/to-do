<?php
    if(!array_key_exists('P', $_GET) || empty($_GET['P']))
	    $_GET['P'] = 'home';

    
    switch ($_GET['P']) 
    {
        case 'home': 
            require_once BACKEND_DIR.'home.php'; 
            break;
        

        case 'login':
            !IsUserLoggedIn() ? require_once BACKEND_DIR.'user/login.php' : header('Location: index.php?P=home');
            break;
            
        case 'registration':
            !IsUserLoggedIn() ? require_once BACKEND_DIR.'user/register.php' : header('Location: index.php?P=home');
            break;

        case 'todo':  
            IsUserLoggedIn() ? require_once BACKEND_DIR.'todo.php' : header('Location: index.php?P=home');
            break;
        
        case 'report':
            require_once BACKEND_DIR.'bugreport.php';
            break;

        case 'delete':  
            IsUserLoggedIn() ? require_once BACKEND_DIR.'user/userDelete.php' : header('Location: index.php?P=home');
            break;

        case 'logout':  
            IsUserLoggedIn() ? UserLogout() : header('Location: index.php?P=home');
            break;

        default:
            require_once BACKEND_DIR.'404.php'; 
            break;
    }
?>