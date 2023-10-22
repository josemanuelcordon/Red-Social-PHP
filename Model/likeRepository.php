<?php
class likeRepository
{
    public static function likePost($idArticulo, $idUsuario)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM likes WHERE id_articulo=" . $idArticulo . " AND id_usuario=" . $idUsuario;
        $result = $bd->query($q);
        if ($result->num_rows == 0) {
            $q = "INSERT INTO likes VALUES (" . $idArticulo . "," . $idUsuario . ")";
            $bd->query($q);
        } else {
            $q = "DELETE FROM likes WHERE id_articulo=" . $idArticulo . " AND id_usuario=" . $idUsuario;
            $bd->query($q);
        }
    }
}
