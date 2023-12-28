<?php

require_once 'Conexion.php';

class RespuestaModel
{

    static public function listar($tabla, $columna, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT r.*, CONCAT_WS(' ', pe.nombre, pe.paterno, pe.materno) as usuario FROM $tabla r 
                                                   JOIN usuario u ON r.id_usuario = u.id_usuario
                                                   JOIN persona pe ON u.id_usuario = pe.id_persona WHERE $columna =:$columna");
            $stmt->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
    }

    static public function guardarRespuesta($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (descripcion, foto, id_usuario,id_pregunta) VALUES (:descripcion, :foto, :id_usuario, :id_pregunta)");

        $stmt->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos['foto'], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_INT);
        $stmt->bindParam(":id_pregunta", $datos['id_pregunta'], PDO::PARAM_INT);

        return $stmt->execute();
    }
}
