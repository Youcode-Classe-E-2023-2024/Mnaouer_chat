<?php

class Room
{
    public $id;
    public $name;
    public $desc;
    public $timestamp;

    function __construct($id = null)
    {
        if ($id) {
            global $db;

            $room = $db->query("SELECT * FROM rooms WHERE rooms_id = '$id'");

            $this->id = $room['rooms_id'];
            $this->name = $room['rooms_name'];
            $this->desc = $room['rooms_name'];
            $this->timestamp = $room['rooms_name'];
        }
    }

    static function getAll()
    {
        global $db;

        $result = $db->query("SELECT * FROM rooms");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function getMessages()
    {
        global $db;
        $result = $db->query("SELECT * FROM messages WHERE messages_room = '$this->id';");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function getMembers()
    {
        global $db;
        $result = $db->query("
        SELECT users_username
        FROM rooms
                 JOIN users_rooms on rooms_id = rooms_users_id
                 JOIN users on users_rooms_id = users_id
        WHERE rooms_id = '$this->id';
        ");
        return $result->fetch_all(1);
    }

    function inviteMembers()
    {

    }

    function create($users, $owner_id)
    {
        global $db;
        $result_room = $db->query("INSERT INTO rooms (rooms_name, rooms_desc) VALUES ('$this->name', '$this->desc');");
        $id = $db->insert_id;
        $result_owner = $db->query("INSERT INTO users_rooms (rooms_users_id, users_rooms_id, users_rooms_is_owner) VALUES ('$id', '$owner_id', true);");

        if ($result_room && $result_owner) {
            if (isset($users) && !empty($users)) {
                foreach ($users as $user_id) {
                    $db->query("INSERT INTO users_rooms (rooms_users_id, users_rooms_id, users_rooms_is_invited) VALUES ('$id', '$user_id', true);");
                }
            }

            return true;
        }
        return false;
    }

    function ban()
    {

    }
}
