<?php

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pwd']) && !empty($_POST['pwd'])) {
    $user = new User();
    $user->username = $_POST['username'];
    $user->email = $_POST['email'];
    $user->setPassword($_POST['pwd']);

    $result_register = $user->register();
}
