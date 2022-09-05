<?PHP
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

if (ControlSesion::sesion_iniciada()) {

    include_once 'app/Conexion.inc.php';
    include_once 'app/config.inc.php';
    include_once 'app/RepositorioEntradas.inc.php';
    include_once 'app/Entrada.inc.php';
    include_once 'app/ValidadorEntrada.inc.php';

    $entrada_publica = 0;
    if (isset($_POST['guardar'])) {
        Conexion::abrir_conexion();

        $validador = new ValidadorEntrada(
                Conexion::get_conexion(),
                $_POST['titulo'],
                $_POST['url'],
                htmlspecialchars($_POST['texto']));

        if (isset($_POST['publicar']) && $_POST['publicar'] == 'si') {
            $entrada_publica = 1;
        }

        if ($validador->entrada_valida()) {
            $entrada = new Entrada(
                    '',
                    $_SESSION['id_usuario'],
                    $validador->get_Url(),
                    $validador->get_Titulo(),
                    $validador->get_Texto(),
                    '',
                    $entrada_publica
            );

            $entrada_insertada = RepositorioEntradas::insertar_entrada(Conexion::get_conexion(), $entrada);
            if ($entrada_insertada) {
                Redireccion::redirigir(RUTA_GESTOR_ENTRADAS);
            }
            Conexion::cerrar_conexion();
        }
    }

    $titulo = 'Nueva entrada';

//declara el inicio del documento
    include_once 'plantillas/documento-declaracion.inc.php';

//Barra de navegacion estatica
    include_once 'plantillas/navbar.inc.php';
    ?>

    <!-- Banner de principal nueva entrada -->
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center">Nueva entrada</h1>
        </div>
    </div>

    <!-- Banner de principal -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="form-nueva-entrada" method="post" action="<?PHP echo RUTA_NUEVA_ENTRADA; ?>">
                    <?PHP
                    if (isset($_POST['guardar'])) {
                        include_once 'plantillas/entrada_validada.inc.php';
                    } else {
                        include_once 'plantillas/entrada_vacia.inc.php';
                    }
                    ?>
                    
                </form>
            </div>
        </div>
    </div>

    <?PHP
    include_once 'plantillas/documento-cierre.inc.php';
} else {
    Redireccion::redirigir(SERVIDOR);
}
?>