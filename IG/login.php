<?php
session_start();
require_once 'db.php';
require_once 'classes/User.php';
require_once 'services/UserService.php';

$nickname = $_POST['nickname'];
$pass = md5($_POST['password']); 

if (empty($nickname) || empty($pass)) {
    $_SESSION['message'] = 'Please fill in all fields';
    header('Location: signin.php');
    exit;
}

$userService = new UserService($conn);
$user = $userService->authenticate($nickname, $pass);


if ($user) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'nickname' => $user['nickname']
    ];
    header('Location: index.php');
    exit;
} else {
    $_SESSION['message'] = 'There is no such user';
    header('Location: signin.php');
    exit;
}


