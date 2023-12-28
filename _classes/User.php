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

    static function getAll()
    {
        global $db;
        $result = $db->query("SELECT * FROM user");
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

    function login($email, $password)
    {
        global $db;

        //les points sont la liason entre string email et adresse email et password et pwd
        $result = $db->query('SELECT * FROM users WHERE users_email ="' . $email . '"  and users_password = "' . $password . '";');

        return $result->fetch_assoc();
    }

    function logout()
    {
        session_destroy();
    }
}