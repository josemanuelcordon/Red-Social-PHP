<?php
if (!empty($_POST['publicar_x'])) {
    $titulo = $_POST['titulo'];
    $post = $_POST['post'];
    $idAutor = $_SESSION['user']->getId();
    ArticleRepository::publishPost($titulo, $post, $idAutor);
}

if (!empty($_GET['yp'])) {
    $id = $_SESSION['user']->getId();
    $articles = ArticleRepository::getMyArticles($id);
}

if (!empty($_GET['fp'])) {
    $id = $_SESSION['user']->getId();
    $articles = ArticleRepository::getMyFriendArticles($id);
}
