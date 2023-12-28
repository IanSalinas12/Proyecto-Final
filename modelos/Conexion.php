<?php

class Conexion{
    static public function conectar(){
        $conexion = new PDO("mysql:host={$_ENV['HOST']};dbname={$_ENV['DB']}","{$_ENV['USER']}","{$_ENV['PASSWORD']}");
        return $conexion;
    }
}