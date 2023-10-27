<?php
class CommentRepository
{
    public static function publishComment($comentario, $autor, $articulo, $respuesta = 0)
    {
        $bd = Conectar::conexion();
        $fecha = date("Y-m-d H:i:s");
        $q = "INSERT INTO comentarios VALUES (NULL, '" . $comentario . "','" . $autor . "', '" . $articulo . "', '" . $fecha . "')";
        $bd->query($q);
        $id_comment = $bd->insert_id;
        if ($respuesta) {
            $q = "INSERT INTO respuestas VALUES (" . $respuesta . "," . $id_comment . ")";
            $bd->query($q);
        }
        return $id_comment;
    }
    public static function getComments($id)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM comentarios WHERE articulo=" . $id;
        $comments = [];
        $result = $bd->query($q);
        $nivel = 1;
        while ($datos = $result->fetch_assoc()) {
            $comments[] = [new Comment($datos), $nivel];
            if (CommentRepository::getAnswers($datos['id'])) {
                $nivel++;
            } else {
                $nivel = 1;
            }
        }
        return $comments;
    }

    public static function getAnswers($id)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM comentarios WHERE id IN (SELECT id_respuesta FROM respuestas WHERE id_comentario=" . $id . ")";
        $answers = [];
        $result = $bd->query($q);
        while ($datos = $result->fetch_assoc()) {
            $answers[] = new Comment($datos);
        }
        return $answers;
    }
}
