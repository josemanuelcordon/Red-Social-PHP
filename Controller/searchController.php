<?php
$articlesSearched = [];



if (!empty($_POST['search-box'])) {
    $searchContent = $_POST['search-box'];
    $articlesSearched = ArticleRepository::searchArticles($searchContent);
    var_dump($articlesSearched);
    include("View/searchView.phtml");
    die;
}

if (!empty($_GET['search'])) {
    include('View/searchView.phtml');
    die;
}