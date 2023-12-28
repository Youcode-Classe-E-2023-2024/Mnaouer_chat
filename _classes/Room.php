<?php

class Room
{
    public $id;
    public $name;
    public $desc;
    public $timestamp;

    function __construct($id)
    {
        global $db;

        $room = $db->query("SELECT * FROM rooms WHERE rooms_id = '$id'");

        $this->id = $room['rooms_id'];
        $this->name = $room['rooms_name'];
        $this->desc = $room['rooms_name'];
        $this->timestamp = $room['rooms_name'];
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
        FROM tickets
                 JOIN tickets_users ON tickets.tickets_id = tickets_users.tickets_users_id
                 JOIN users ON tickets_users.users_tickets_id = users.users_id
        WHERE tickets.tickets_id = '$id';
        ");
        return $result->fetch_all(1);
    }

    static function create($rooms_name, $rooms_desc)
    {
        global $db;
        return $db->query("INSERT INTO rooms (rooms_name, rooms_desc) VALUES ('$rooms_name', '$rooms_desc');");
    }

    function ban()
    {

    }
}
