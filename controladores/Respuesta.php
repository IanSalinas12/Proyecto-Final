<?php

class Respuesta
{

    static public function listarRespuestas($tabla, $columna, $valor)
    {
        $respuesta = RespuestaModel::listar($tabla, $columna, $valor);
        return $respuesta;
    }
    static public function guardarRespuesta()
    {
        if (isset($_POST['descripcion'])) {
            $descripcion = trim($_POST['descripcion']);
            if (self::validarEntrada($descripcion)) {
                //guardar respuesta
                $ruta = NULL;

                if (isset($_FILES['foto']['name']) && $_FILES['foto']['name'] != "") {
                    $directorio = "vistas/upload/respuesta/";
                    $ruta = $directorio . time() . '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                    move_uploaded_file($_FILES['foto']['name'], $ruta);
                }

                $datos = [
                    'descripcion' => $descripcion,
                    'foto' => $ruta,
                    'id_usuario' => $_SESSION['id'],
                    'id_pregunta' => $_POST['id_pregunta']
                ];

                $respuesta = RespuestaModel::guardarRespuesta("respuesta", $datos);
                $ruta = $_ENV['BASE_URL'] . 'respuesta/'. $_POST['id_pregunta'];
                
                if ($respuesta) {
                    echo "<script>
                                let text = 'Respuesta guardada correctamente';
                                if(comfirm(text)){
                                    window.location = '" . $ruta . "';
                                }  
                            </script>";
                } else {
                    echo "<script>
                                alert('Error al guardar la respuesta');        
                            </script>";
                }
            } else {
                echo "<script>
                        alert('El campo descripcion no debe llevar caracteres especiales');        
                    </script>";
            }
        }
    }

    static private function validarEntrada($input)
    {
        return preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓ¡Ú¿?!,. ]+$/', $input);
    }

    static private function validarImagen($tipo)
    {
        if ($tipo != "") {
            return $tipo === 'image/png' || $tipo === 'image/jpeg' || $tipo === 'image/jpg';
        } else {
            return true;
        }
    }

    static public function listarRespuestasUsuario()
    {
        $respuesta =  RespuestaModel::contarRespuestasUsuario($_SESSION['id']);
        return $respuesta;
    }
}
