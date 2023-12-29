<?php

require_once 'Conexion.php';

class UsuarioModel
{

    static public function listarUsuario()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario u JOIN persona p ON u.id_usuario = p.id_persona ");
            $stmt->execute();
            return $stmt->fetchAll();
    }

    static public function registrarPersona($tabla, $datos)
    {
        $sql = "INSERT INTO $tabla (nombre, paterno, materno) VALUES (:nombre, :paterno, :materno)";
        $con = Conexion::conectar();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":paterno", $datos['paterno'], PDO::PARAM_STR);
        $stmt->bindParam(":materno", $datos['materno'], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return $con->lastInsertId();
        } else {
            return false;
        }
    }

    static public function registrarUsuario($tabla, $datos)
    {
        $sql = "INSERT INTO $tabla (id_usuario, usuario, clave, rol) VALUES (:id_usuario, :usuario, :clave, :rol)";
        $con = Conexion::conectar();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);
        $stmt->bindParam(":clave", $datos['clave'], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datos['rol'], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    static public function obtenerPersona(int $id_persona)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM persona p JOIN usuario u ON p.id_persona = u.id_usuario WHERE p.id_persona=:id");
        $stmt->bindParam(":id", $id_persona, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    static public function obtenerPersonaPorUsuario(string $usuario)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM persona p JOIN usuario u ON p.id_persona = u.id_usuario WHERE u.usuario=:usuario");
        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }
}
