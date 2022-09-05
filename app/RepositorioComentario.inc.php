<?PHP

include_once 'config.inc.php';
include_once 'Conexion.inc.php';
include_once 'Comentario.inc.php';

class RepositorioComentario {

    public static function insertar_comentario($conexion, $comentario) {
        $comentario_insertado = false;
        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO comentarios (autor_id , entrada_id , titulo , texto, fecha, activo) VALUES (:autor_id, :entrada_id, :titulo, :texto, NOW(), 1)";

                $sentencia = $conexion->prepare($sql);

                $AUTOR_ID = $comentario->get_autor_id();
                $ENTRADA_ID = $comentario->get_entrada_id();
                $TITULO = $comentario->get_titulo();
                $TEXTO = $comentario->get_texto();

                $sentencia->bindParam(':autor_id', $AUTOR_ID, PDO::PARAM_STR);
                $sentencia->bindParam(':entrada_id', $ENTRADA_ID, PDO::PARAM_STR);
                $sentencia->bindParam(':titulo', $TITULO, PDO::PARAM_STR);
                $sentencia->bindParam(':texto', $TEXTO, PDO::PARAM_STR);

                $comentario_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
            }
            return $comentario_insertado;
        }
    }

    public static function get_comentarios($conexion, $id_entrada) {
        $comentarios = array();
        if (isset($conexion)) {
            try {
                include_once 'Comentario.inc.php';
                $sql = "SELECT * FROM comentarios WHERE entrada_id = :entrada_id";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':entrada_id', $id_entrada, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $comentarios[] = new Comentario(
                                $fila['id'],
                                $fila['autor_id'],
                                $fila['entrada_id'],
                                $fila['titulo'],
                                $fila['texto'],
                                $fila['fecha'],
                                $fila['activo']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                die();
            }
        }
        return $comentarios;
    }
    
    public static function contar_comentarios_activos_usuario($conexion, $id_usuario) {
        $total_comentarios = 0;
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) AS total_comentarios FROM comentarios WHERE autor_id = :autor_id AND activo = 1";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $total_comentarios = $resultado['total_comentarios'];
                }
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                die();
            }
        }
        return $total_comentarios;
    }
    
    public static function contar_comentarios_inactivos_usuario($conexion, $id_usuario) {
        $total_comentarios = 0;
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) AS total_comentarios FROM comentarios WHERE autor_id = :autor_id AND activo = 0";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $total_comentarios = $resultado['total_comentarios'];
                }
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                die();
            }
        }
        return $total_comentarios;
    }

}
