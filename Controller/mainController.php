<?php
//cargar modelos
require_once("Model/ArticleClass.php");
require_once("Model/UserClass.php");
require_once("Model/CommentClass.php");
require_once("Model/ArticleRepository.php");
require_once("Model/UserRepository.php");
require_once("Model/CommentRepository.php");

session_start();
//Usar modelos

$articles = ArticleRepository::getArticles();
$friends = [];
$comments = [];
$answers = [];


if (!empty($_GET['controller'])) {
    $controlador = $_GET['controller'];
    if ($controlador == "user") {
        require("Controller/userController.php");
    }
    if ($controlador == "article") {
        require("Controller/articleController.php");
    }
    if ($controlador == "comment") {
        require("Controller/commentController.php");
    }
    if ($controlador == "search") {
        require("Controller/searchController.php");
    }
}













//Cargar Vistas
include("View/mainView.phtml");
