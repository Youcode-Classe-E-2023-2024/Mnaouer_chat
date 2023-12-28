<?php
if (isset($result_register))
{
    if ($result_register) {
        header("Location: index.php?page=login");
    } else {
        header("Location: index.php?page=register");
    }
}
