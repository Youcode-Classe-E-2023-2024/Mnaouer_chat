<?php
if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pwd']) && !empty($_POST['pwd']))
{
    // Instantier la classe utilisateur
    include_once 'models/User.php';
    $user = new User();

    $result = $user->register($_POST['username'],$_POST['email'], $_POST['pwd']);

    if ($result) {
        header("Location:" . __URI__ . "index.php?page=login");
    } else {
        header("Location:" . __URI__ . "index.php?page=register");
    }
}
