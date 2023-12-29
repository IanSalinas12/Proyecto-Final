<?php

class Persona
{

    static public function listarUsuarios()
    {
        $respuesta = UsuarioModel::listarUsuario();
        return $respuesta;
    }
     
}
