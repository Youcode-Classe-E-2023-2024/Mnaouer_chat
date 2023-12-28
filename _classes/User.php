<?php

class User
{
    public $id;
    public $email;
    public $username;
    private $password;

    public function __construct($id = null)
    {
        if ($id) {
            global $db;

            $result = $db->query("SELECT * FROM users WHERE users_id = '$id'");
            $user = $result->fetch_assoc();

            $this->id = $user['users_id'];
            $this->email = $user['users_email'];
            $this->username = $user['users_username'];
            $this->password = $user['users_password'];
        }

    }

    static function getAll($sign_in_user)
    {
        global $db;
        $result = $db->query("SELECT * FROM users WHERE users_id != '$sign_in_user'");
        if ($result)
            return $result->fetch_all(MYSQLI_ASSOC);
    }

    function edit()
    {
        global $db;
        return $db->query("UPDATE users SET users_email = '$this->email', users_username = '$this->username' WHERE users_id = '$this->id'");
    }

    function setPassword($pwd)
    {
        $this->password = password_hash($pwd, PASSWORD_DEFAULT);
    }

    function register()
    {
        global $db;

        $db->query("INSERT INTO users (users_username, users_email, users_password) VALUES ('$this->username', '$this->email', '$this->password');");

        return $db->insert_id;
    }

//    static function login($email, $password)
//    {
//        global $db;
//
//        $result = $db->query("SELECT * FROM users WHERE users_email ='$email';");
//
//        $user = $result->fetch_assoc();
//
//        $is_pwd_correct = password_verify($password, $user['users_password']);
//    }

    static function login($email, $password)
    {
        global $db;

        $result = $db->query("SELECT * FROM users WHERE users_email ='$email';");

        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['users_password'])) {
            // Return user details if login is successful
            return $user;
        }

        // Return null or false if login fails
        return null;
    }

}