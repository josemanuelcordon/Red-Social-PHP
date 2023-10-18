<?php

if (!empty($_GET['lo'])) {
    session_destroy();
    session_start();
}
if (!empty($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['user'] = UserRepository::checkUser($username, $password);
}

if (!empty($_GET['yf'])) {
    $id = $_SESSION['user']->getId();
    $friends = UserRepository::getFriends($id);
}
