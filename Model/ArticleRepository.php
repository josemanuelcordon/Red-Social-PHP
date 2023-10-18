<?php
class ArticleRepository
{
    public static function getArticles()
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM articulos";
        $result = $bd->query($q);
        $articles = [];

        while ($datos = $result->fetch_assoc()) {
            $articles[] = new Article($datos);
        }

        return $articles;
    }


    public static function publishPost($titulo, $contenido, $idAutor)
    {
        $bd = Conectar::conexion();
        $fecha = date("Y-m-d H:i:s");
        $q = "INSERT INTO articulos VALUES(NULL, '" . $titulo . "','" . $contenido . "', '" . $fecha . "', $idAutor)";
        $bd->query($q);
    }

    public static function getMyArticles($id)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM articulos WHERE autor=" . $id;
        $result = $bd->query($q);
        $articles = [];
        while ($datos = $result->fetch_assoc()) {
            $articles[] = new Article($datos);
        }

        return $articles;
    }

    public static function getArticleById($id)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM articulos WHERE id=" . $id;
        $result = $bd->query($q);
        $datos = $result->fetch_assoc();
        $article = new Article($datos);

        return $article;
    }

    public static function getMyFriendArticles($id)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM articulos WHERE autor IN (SELECT id_seguido FROM amigos WHERE id_seguidor=" . $id . ")";
        $result = $bd->query($q);
        $articles = [];
        while ($datos = $result->fetch_assoc()) {
            $articles[] = new Article($datos);
        }
        return $articles;
    }
}
