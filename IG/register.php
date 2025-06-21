<?php
session_start();
require_once 'db.php';
require_once 'classes/User.php';
require_once 'services/UserService.php';

$nickname = $_POST['nickname'];
$pass = $_POST['password'];
$repeatpass = $_POST['repeatpassword'];
$email = $_POST['email'];

if (empty($nickname) || empty($pass) || empty($repeatpass) || empty($email)) {
    $_SESSION['message'] = 'Please fill in all fields';
    header('Location: signup.php');
    exit;
}

if ($pass !== $repeatpass) {
    $_SESSION['message'] = 'The passwords do not match';
    header('Location: signup.php');
    exit;
}

$hashedPassword = md5($pass);
$user = new User($nickname, $hashedPassword, $email);
$userService = new UserService($conn);

if ($userService->register($user)) {
    $_SESSION['message'] = '';
    header('Location: signin.php');
    exit;
} else {
    $_SESSION['message'] = 'Registration failed';
    header('Location: signup.php');
    exit;
}


