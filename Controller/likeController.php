<?php

if (!empty($_GET['like'])) {
    $idUser = $_SESSION['user']->getId();
    likeRepository::likePost($_GET['like'], $idUser);
    header('location: index.php');
}
