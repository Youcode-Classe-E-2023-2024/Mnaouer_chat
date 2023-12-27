<?php

class Room
{
    function __construct()
    {

    }

    static function listAll()
    {
        global $db;

        $result = $db->query("SELECT * FROM rooms");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function selectMessagesById($id)
    {
        global $db;
        $result = $db->query("SELECT * FROM messages WHERE messages_room = '$id';");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function selectUsersById($id)
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

    function selectById($id)
    {
        global $db;
        $result = $db->query("SELECT tickets_id, tickets_title, tickets_desc FROM tickets WHERE tickets_id='$id'");
        return $result->fetch_assoc();
    }

    function create($tickets_title, $tickets_desc, $tickets_status, $tickets_priority, $tags, $users)
    {
        global $db;
        $user_id = $_SESSION['user_id'];
        $result = $db->query("INSERT INTO tickets (tickets_title, tickets_desc, tickets_status, tickets_priority, tickets_created_by) VALUES ('$tickets_title', '$tickets_desc', '$tickets_status', '$tickets_priority', '$user_id');");

        $id = $db->insert_id;

        if ($result) {
            if (isset($tags) && !empty($tags)) {
                foreach ($tags as $tag_id) {
                    $db->query("INSERT INTO tickets_tags (tickets_tags_id, tags_tickets_id) VALUES ('$id', '$tag_id');");
                }
            }

            if (isset($users) && !empty($users)) {
                foreach ($users as $user_id) {
                    $db->query("INSERT INTO tickets_users (tickets_users_id, users_tickets_id) VALUES ('$id', '$user_id');");
                }
            }

            return true;
        }
        return false;
    }

    function assign()
    {
        echo 'assign';
    }

    public function comment($user_id, $ticket_id, $text)
    {
        global $db;
        return $db->query("INSERT INTO comment (text, creatorId, ticketId) VALUES ('$text','$user_id', '$ticket_id');");
    }

}
