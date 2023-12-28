<?php

if (isset($_POST['users'])
    && isset($_POST['rooms_name']) && !empty($_POST['rooms_name'])
    && isset($_POST['rooms_desc']) && !empty($_POST['rooms_desc'])) {

    $room = new Room();
    $room->name = $_POST['rooms_name'];
    $room->desc = $_POST['rooms_desc'];

    $result_room = $room->create($_POST['users'], $_SESSION['user_id']);
}
