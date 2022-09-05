<?PHP

include_once 'config.inc.php';
include_once 'Conexion.inc.php';
include_once 'Entrada.inc.php';

class RepositorioEntradas {

    public static function insertar_entrada($conexion, $entrada) {
        $entrada_insertada = false;
        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO entradas ( autor_id , url , titulo , texto, fecha, activa) VALUES ( :autor_id, :url, :titulo, :texto, NOW(), :activa)";

                $sentencia = $conexion->prepare($sql);

                $AUTOR_ID = $entrada->get_autor_id();
                $URL = $entrada->get_url();
                $TITULO = $entrada->get_titulo();
                $TEXTO = $entrada->get_texto();
                $ACTIVA = $entrada->is_activa();

                $sentencia->bindParam(':autor_id', $AUTOR_ID, PDO::PARAM_STR);
                $sentencia->bindParam(':url', $URL, PDO::PARAM_STR);
                $sentencia->bindParam(':titulo', $TITULO, PDO::PARAM_STR);
                $sentencia->bindParam(':texto', $TEXTO, PDO::PARAM_STR);
                $sentencia->bindParam(':activa', $ACTIVA, PDO::PARAM_STR);

                $entrada_insertada = $sentencia->execute();
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
            }
            return $entrada_insertada;
        }
    }

    public static function get_todas_por_fecha_decendente($conexion) {
        $entradas = array();
        if (isset($conexion)) {
            try {
                include_once 'Entrada.inc.php';
                $sql = "SELECT * FROM entradas WHERE activa = 1 ORDER BY fecha DESC LIMIT 5";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new Entrada(
                                $fila['id'],
                                $fila['autor_id'],
                                $fila['url'],
                                $fila['titulo'],
                                $fila['texto'],
                                $fila['fecha'],
                                $fila['activa']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                die();
            }
        }
        return $entradas;
    }

    public static function get_entrada_por_url($conexion, $url) {
        $entrada = null;
        if (isset($conexion)) {
            try {
                include_once 'Entrada.inc.php';
                $sql = "SELECT * FROM entradas WHERE url LIKE :url ORDER BY fecha DESC";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':url', $url, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $entrada = new Entrada(
                            $resultado['id'],
                            $resultado['autor_id'],
                            $resultado['url'],
                            $resultado['titulo'],
                            $resultado['texto'],
                            $resultado['fecha'],
                            $resultado['activa']
                    );
                }
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                die();
            }
        }
        return $entrada;
    }

    public static function get_entradas_random($conexion, $limite) {
        $entradas = array();
        if (isset($conexion)) {
            try {
                include_once 'Entrada.inc.php';
                $sql = "SELECT * FROM entradas WHERE activa = 1 ORDER BY RAND() LIMIT $limite";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new Entrada(
                                $fila['id'],
                                $fila['autor_id'],
                                $fila['url'],
                                $fila['titulo'],
                                $fila['texto'],
                                $fila['fecha'],
                                $fila['activa']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                die();
            }
        }
        return $entradas;
    }

    public static function contar_entradas_activas_usuario($conexion, $id_usuario) {
        $total_entradas = 0;
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) AS total_entradas FROM entradas WHERE autor_id = :autor_id AND activa = 1";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $total_entradas = $resultado['total_entradas'];
                }
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                die();
            }
        }
        return $total_entradas;
    }

    public static function contar_entradas_inactivas_usuario($conexion, $id_usuario) {
        $total_entradas = 0;
        if (isset($conexion)) {
            try {
                include_once 'Entrada.inc.php';
                $sql = "SELECT COUNT(*) AS total_entradas FROM entradas WHERE autor_id = :autor_id AND activa = 0";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $total_entradas = $resultado['total_entradas'];
                }
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                die();
            }
        }
        return $total_entradas;
    }

    public static function get_entradas_usuario_fecha_decendente($conexion, $id_usuario) {
        $entradas_obtenidas = [];
        if (isset($conexion)) {
            try {
                include_once 'Entrada.inc.php';
                $sql = "SELECT a.id, a.autor_id, a.url, a.titulo, a.texto, a.fecha, a.activa, 
                        COUNT(b.id) AS 'cantidad_comentarios'
                        FROM entradas a
                        LEFT JOIN comentarios b 
                        ON a.id = b.entrada_id
                        WHERE a.autor_id = :autor_id
                        GROUP BY a.id
                        ORDER BY a.fecha DESC";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas_obtenidas[] = array(
                            new Entrada(
                                    $fila['id'],
                                    $fila['autor_id'],
                                    $fila['url'],
                                    $fila['titulo'],
                                    $fila['texto'],
                                    $fila['fecha'],
                                    $fila['activa']
                            ),
                            $fila['cantidad_comentarios']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                die();
            }
        }
        return $entradas_obtenidas;
    }

    public static function titulo_existe($conexion, $titulo) {
        $titulo_existe = true;
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM entradas WHERE titulo = :titulo";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':titulo', $titulo, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $titulo_existe = true;
                } else {
                    $titulo_existe = false;
                }
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
            }
        }
        return $titulo_existe;
    }

    public static function url_existe($conexion, $url) {
        $url_existe = true;
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM entradas WHERE url = :url";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':url', $url, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $url_existe = true;
                } else {
                    $url_existe = false;
                }
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
            }
        }
        return $url_existe;
    }

    public static function eliminar_comentarios_y_entradas($conexion, $entrada_id) {
        if (isset($conexion)) {
            try {
                $conexion->beginTransaction();
                
                $sql1 = "UPDATE comentarios SET activo='2' WHERE entrada_id  = :entrada_id ;";
                $sentencia1 = $conexion->prepare($sql1);
                $sentencia1->bindParam(':entrada_id', $entrada_id, PDO::PARAM_STR);
                $sentencia1->execute();
                
                $sql1 = "UPDATE entradas SET activa='2' WHERE id  = :entrada_id ;";
                $sentencia2 = $conexion->prepare($sql1);
                $sentencia2->bindParam(':entrada_id', $entrada_id, PDO::PARAM_STR);
                $sentencia2->execute();
                
                $conexion->commit();
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                $conexion->rollBack();
            }
        }
    }
    public static function publicar_entrada($conexion, $entrada_id) {
        if (isset($conexion)) {
            try {
                $conexion->beginTransaction();
                
                $sql = "UPDATE entradas SET activa='1' WHERE id  = :entrada_id ;";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':entrada_id', $entrada_id, PDO::PARAM_STR);
                $sentencia->execute();
                
                $conexion->commit();
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                $conexion->rollBack();
            }
        }
    }
    public static function privatizar_entrada($conexion, $entrada_id) {
        if (isset($conexion)) {
            try {
                $conexion->beginTransaction();
                
                $sql = "UPDATE entradas SET activa='0' WHERE id  = :entrada_id ;";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':entrada_id', $entrada_id, PDO::PARAM_STR);
                $sentencia->execute();
                
                $conexion->commit();
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                $conexion->rollBack();
            }
        }
    }

}
