<?php

class Pregunta
{

    static public function listarPreguntas($tabla, $columna, $valor)
    {
        $respuesta = PreguntaModel::listar($tabla, $columna, $valor);
        return $respuesta;
    }
    static public function guardarPregunta()
    {
        if (isset($_POST['titulo']) && isset($_POST['descripcion'])) {
            $titulo = trim($_POST['titulo']);
            $descripcion = trim($_POST['descripcion']);
            if (self::validarEntrada($titulo) && self::validarEntrada($descripcion) && self::validarImagen($_FILES['foto']['type'])) {
                //guardar pregunta
                $directorio = "vistas/upload/pregunta";
                $archivo = $directorio . time() . '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

                if (move_uploaded_file($_FILES['foto']['tmp_name'], $archivo)) {
                    $datos = [
                        'titulo' => $titulo,
                        'descripcion' => $descripcion,
                        'foto' => $archivo,
                        'id_usuario' => 1
                    ];

                    $respuesta = PreguntaModel::guardarPregunta("pregunta", $datos);

                    if ($respuesta) {
                        echo "<script>
                                let text = 'Pregunta guardada correctamente';
                                if(comfirm(text)){
                                    window.location = 'preguntas';
                                }  
                            </script>";
                    }else{
                        echo "<script>
                                alert('Error al guardar la pregunta');        
                            </script>";                      
                    }
                }
            } else {
                echo "<script>
                        alert('El campo titulo y la descripcion no debe llevar caracteres especiales');        
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
        return $tipo === 'image/png' || $tipo === 'image/jpeg' || $tipo === 'image/jpg';
    }
}
