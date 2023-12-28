<?php
//if (isset($_POST['login']))
//{
//    if (isset($user_login)) {
//        $_SESSION['user_id'] = $user_login['users_id'];
//        header("Location: index.php?page=home");
//    } else {
//        header("Location: index.php?page=login");
//    }
//}
//
//if (isset($_POST['logout'])) {
//    session_destroy();
//}
//session_start();

if (isset($_POST['login'])) {
    $user_login = User::login($_POST['email'], $_POST['password']);

    if ($user_login) {
        $_SESSION['user_id'] = $user_login['users_id'];
        header("Location: index.php?page=home");
        exit();
    } else {
        header("Location: index.php?page=login");
        exit();
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php?page=login");
    exit();
}



//if (isset($_POST['login']))
//{
//    if (isset($user_login)) {
//        $_SESSION['user_id'] = $user_login['users_id'];
//        header("Location: index.php?page=home");
//    } else {
//        header("Location: index.php?page=login");
//    }
//}
//
//if (isset($_POST['logout'])) {
//    session_destroy();
//}