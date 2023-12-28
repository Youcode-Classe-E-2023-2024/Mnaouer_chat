<?php
if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']))
{
    $user_login = User::login($_POST['email'], $_POST['password']);
//    dd($user_login);
}
