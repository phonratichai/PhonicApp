<?php
    require '../class/user_class.php';
    $user_id = $_GET['user_id'];

    $user = new User();
    $user ->delete($user_id);

?>