<?PHP
include_once 'Conexion.inc.php';
include_once 'RepositorioEntradas.inc.php';
include_once 'Entrada.inc.php';

class EscritorEntradas {

    public static function escribir_entradas() {
        $entradas = RepositorioEntradas::get_todas_por_fecha_decendente(Conexion::get_conexion());

        if (count($entradas)) {
            foreach ($entradas as $entrada) {

                self::escribir_entrada($entrada);
            }
        }
    }

    public static function escribir_entrada($entrada) {

        if (!isset($entrada)) {
            return;
        }
        ?>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?PHP
                        echo $entrada->get_titulo();
                        ?>
                    </div>
                    <div class="panel-body">
                        <p>
                            <strong>
                                <?PHP
                                echo $entrada->get_fecha();
                                ?>
                            </strong>
                            <br>
                            <strong>
                                <?PHP
                                echo $entrada->get_id();
                                ?>
                            </strong>
                        </p>
                        <div class="text-justify">
                            <?PHP
                            echo nl2br(self::resumir_texto($entrada->get_texto()));
                            ?>
                        </div>
                        <br>
                        <div class="text-center">
                            <a class="btn btn-primary" href="<?PHP echo RUTA_ENTRADA . '/' . $entrada->get_url(); ?>" 
                               role="button">Seguir leyendo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?PHP
    }

    public static function resumir_texto($texto) {
        $longitud_maxima = 400;

        $resultado = '';

        if (strlen($texto) >= $longitud_maxima) {

            $resultado .= substr($texto, 0, $longitud_maxima);

            $resultado .= '...';
        } else {
            $resultado = $texto;
        }
        return $resultado;
    }

}
?>
