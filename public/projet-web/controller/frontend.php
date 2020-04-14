<?php

require_once('models/MiniChatManager.php');
require_once('models/UserManager.php');

use \ProjetWeb\Model\MiniChatManager;
use \ProjetWeb\Model\UserManager;


function home(){
    require('views/frontend/home.php');
}


function minichat($page){
    $minichatManager = new MiniChatManager();
    $messages = $minichatManager->getMessages_byPage($page);
    require('views/frontend/minichat.php');
}


function profile(){
    $userManager = new UserManager();
    $profile = $userManager->getUser_byID($_SESSION['userID']);
    require('views/frontend/profile.php');
}


function register(){
    require('views/frontend/register.php');
}


function signin(){
    require('views/frontend/signin.php');
}
