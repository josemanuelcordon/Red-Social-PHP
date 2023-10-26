<?php
$articlesSearched = [];



if (!empty($_GET['search-box'])) {
    $searchContent = $_GET['search-box'];
    $linkNumber = ceil(ArticleRepository::linkNumber($searchContent) / 5);
    if (isset($_GET['index'])) {
        $articlesSearched = ArticleRepository::searchArticles($searchContent, $_GET['index'] * 5);
    } else {
        $articlesSearched = ArticleRepository::searchArticles($searchContent);
    }
}

if (!empty($_GET['search'])) {
    include('View/searchView.phtml');
    die;
}
