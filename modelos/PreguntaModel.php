<?php

require_once 'Conexion.php';

class PreguntaModel
{

    static public function listar($tabla, $columna, $valor)
    {
        if ($columna == null) {
            $stmt = Conexion::conectar()->prepare("SELECT p.*, CONCAT_WS(' ', pe.nombre, pe.paterno, pe.materno) as usuario FROM $tabla p JOIN usuario u ON p.id_usuario = u.id_usuario
                                                   JOIN persona pe ON u.id_usuario = pe.id_persona");
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla p JOIN usuario u ON p.id_usuario = u.id_usuario
            JOIN persona pe ON u.id_usuario = pe.id_persona WHERE $columna =:$columna");
            $stmt->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        }
    }

    static public function guardarPregunta($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (titulo, descripcion, foto, id_usuario) VALUES (:titulo, :descripcion, :foto, :id_usuario)");

        $stmt->bindParam(":titulo", $datos['titulo'], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos['foto'], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_INT);

        return $stmt->execute();
    }
}
