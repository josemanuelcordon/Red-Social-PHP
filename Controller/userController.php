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

if (!empty($_GET['user'])) {
    $idUsuario = $_GET['user'];
    $rol = $_POST['rol'];
    if ($rol == "admin") {
        $rol = 2;
    }
    if ($rol == "default") {
        $rol = 1;
    }
    if ($rol == "baneado") {
        $rol = 0;
    }
    UserRepository::changeRol($idUsuario, $rol);
    header("Location: index.php?admin=1&controller=user");
}

if (!empty($_GET['admin'])) {
    $users = UserRepository::getAllUsers();
    include("View/userPanel.phtml");
    die;
}
