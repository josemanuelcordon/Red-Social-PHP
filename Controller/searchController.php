<?php
$articlesSearched = [];



if (!empty($_GET['search-box'])) {
    $searchContent = $_GET['search-box'];
    $linkNumber = ceil(ArticleRepository::linkNumber($searchContent) / 5);
    $filtro = $_GET['filtro'];
    $orden = $_GET['orden'];
    if (isset($_GET['index'])) {
        $articlesSearched = ArticleRepository::searchArticles($searchContent, $_GET['index'] * 5, 5,  $filtro, $orden);
    } else {
        $articlesSearched = ArticleRepository::searchArticles($searchContent, 0, 5, $filtro, $orden);
    }
}

if (!empty($_GET['search'])) {
    include('View/searchView.phtml');
    die;
}
