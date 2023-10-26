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

if (!empty($_POST['r-username'])) {
    $user = $_POST['r-username'];
    $pass = $_POST['r-password'];
    $registroSuccess = UserRepository::registerUser($user, $pass);
}

if (!empty($_GET['yf'])) {
    $id = $_SESSION['user']->getId();
    $friends = UserRepository::getFriends($id);
    include('View/friendPanel.phtml');
    die;
}



if (!empty($_GET['user'])) {
    $idUsuario = $_GET['user'];
    $rol = $_POST['rol'];
    UserRepository::changeRol($idUsuario, $rol);
    header("Location: index.php?admin=1&controller=user");
}

if (!empty($_GET['admin'])) {
    $users = UserRepository::getAllUsers();
    include("View/userPanel.phtml");
    die;
}
