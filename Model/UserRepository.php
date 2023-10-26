<?php
class UserRepository
{
    public static function checkUser($username, $password)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM usuarios WHERE username='" . $username . "' AND password='" . $password . "'";
        $result = $bd->query($q);

        if ($datos = $result->fetch_assoc()) {
            return new User($datos);
        } else {
            return NULL;
        }
    }

    public static function getUserById($id)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM usuarios WHERE id=" . $id;
        $result = $bd->query($q);
        if ($datos = $result->fetch_assoc()) {
            return new User($datos);
        } else {
            return NULL;
        }
    }

    public static function getFriends($id)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM usuarios WHERE id IN (SELECT id_seguido FROM amigos WHERE id_seguidor=" . $id . ")";
        $result = $bd->query($q);
        $users = [];
        while ($datos = $result->fetch_assoc()) {
            $users[] = new User($datos);
        }

        return $users;
    }

    public static function getAllUsers()
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM usuarios";
        $result = $bd->query($q);
        $users = [];
        while ($datos = $result->fetch_assoc()) {
            $users[] = new User($datos);
        }
        return $users;
    }

    public static function changeRol($id, $nuevoRol)
    {
        $bd = Conectar::conexion();
        $q = "UPDATE usuarios SET rol=" . $nuevoRol . " WHERE id=" . $id;
        $bd->query($q);
    }

    public static function registerUser($username, $password)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM usuarios WHERE username ='" . $username . "'";
        $result = $bd->query($q);
        if ($result->num_rows == 0) {
            $q = "INSERT INTO usuarios VALUES (NULL, '" . $username . "', '" . $password . "', 1)";
            $bd->query($q);
            return true;
        } else {
            return false;
        }
    }
}
