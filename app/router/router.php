<?php
require_once('../controllers/TokenController.php');
require_once('../controllers/URLController.php');

$token = $_SERVER['REQUEST_URI'];
$token = substr($token, 1);
if($token == ''){
    header('Location: public/pages/mainPage.html');
}
$token = substr($token, 6);
$url = TokenController::GetURL($token);

if ($url == ''){
    $url = 'public/pages/mainPage.html';
}
header('Location: '.$url);

