<?php
if (!empty($_POST['comment'])) {
    $comment = $_POST['comment'];
    $author = $_SESSION['user']->getId();
    $idArticulo = $_POST['id_articulo'];
    if (!empty($_POST['id_comentario'])) {
        CommentRepository::publishComment($comment, $author, $idArticulo, $_POST['id_comentario']);
    } else {
        CommentRepository::publishComment($comment, $author, $idArticulo);
    }
}

if (!empty($_GET['art'])) {
    $id_articulo = $_GET['art'];
    $comments = CommentRepository::getComments($id_articulo);
    $article = ArticleRepository::getArticleById($id_articulo);
    include("View/commentView.phtml");
    die;
}
