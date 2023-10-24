<?php
$articlesSearched = [];



if (!empty($_GET['search-box'])) {
    $searchContent = $_GET['search-box'];
    $linkNumber = ArticleRepository::linkNumber($searchContent) / 2;
    if (isset($_GET['index'])) {
        $articlesSearched = ArticleRepository::searchArticles($searchContent, $_GET['index'] * 2);
    } else {
        $articlesSearched = ArticleRepository::searchArticles($searchContent);
    }
}

if (!empty($_GET['search'])) {
    include('View/searchView.phtml');
    die;
}
