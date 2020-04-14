<?php
session_start();

require('controller/backend.php');
require('controller/frontend.php');


const MINICHAT_NB_MESSAGE_PER_PAGE = 5;

try {
    if (isset($_GET['action']) && !empty($_GET['action'])) {
        switch ($_GET['action']) {
            case 'admin':
                home();
                break;

            case 'forbidden':
                forbidden();
                break;

            case 'home':
                home();
                break;

            case 'minichat':
                if (isset($_GET['page']) && !empty($_GET['page'])){
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                };

                minichat($page, MINICHAT_NB_MESSAGE_PER_PAGE);
                break;

            case 'minichat_post':
                minichat_post();
                break;

            case 'profile':
                profile();
                break;

            case 'register':
                register();
                break;
            
            case 'register_post':
                register_post();
                break;

            case 'signin':
                signin();
                break;

            case 'signin_post':
                signin_post();
                break;

            case 'signout':
                signout();
                break;

            default:
                home();
                break;
        }
    } else {
        home();
    }
    
} catch (Exception $e) {
    echo ('Erreur: ' . $e->getMessage());
    echo ("<br/><a href='index.php'>Revenir à l'accueil</a>");

}
