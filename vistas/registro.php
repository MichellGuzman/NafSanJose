<?PHP

include_once 'app/Conexion.inc.php';
include_once 'app/config.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';

if (isset($_POST['enviar'])) {

    Conexion :: abrir_conexion();

    $validador = new ValidadorRegistro(
            $_POST['nombre_usuario'],
            $_POST['email_usuario'],
            $_POST['clave_usuario'],
            $_POST['clave2_usuario'],
            Conexion :: get_conexion()
    );

    if ($validador->registro_valido()) {
        $usuario = new Usuario('',
                $validador->get_nombre(),
                $validador->get_email(),
                password_hash($validador->get_password(), PASSWORD_DEFAULT),
                '',
                '');
        $usuario_insertado = RepositoriUsuario :: insertar_usuario(Conexion :: get_conexion(), $usuario);

        if ($usuario_insertado) {
            Redireccion::redirigir(RUTA_REGISTRO_CORRECTO . '/' . $usuario -> get_nombre());
        }
    }
    Conexion :: cerrar_conexion();
}

//titulo de la pagina
$titulo = "Registro";

//declara el inicio del documento
include_once 'plantillas/documento-declaracion.inc.php';

//Barra de navegacion estatica
include_once 'plantillas/navbar.inc.php';

?>

<!-- Banner de principal registro -->
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Formulario de registro</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Instrucciones
                    </h3>
                </div>
                <div class="panel-body">
                    <br>
                    <p>
                        Para realizar el registro de tu cuenta en nuestra plataforma necesitaras,
                        un servicio de correo electrónico, un nombre de usuario y una clave de 
                        seguridad para tu cuenta.(te recomendamos que en tu clave incluyas mayúsculas,
                        minúsculas, números y letras para que sea mas segura)
                    </p>
                    <br>
                    <a href="<?PHP echo RUTA_LOGIN?>">¿Ya tienes cuenta?</a>
                    <br>
                    <br>
                    <a href="#">¿Olvidaste tu clave?</a>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Formulario de registro
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?PHP echo RUTA_REGISTRO; ?>">
                        <?PHP
                        if (isset($_POST['enviar'])) {
                            include_once 'plantillas/registro_validado.inc.php';
                        } else {
                            include_once 'plantillas/registro_vacio.inc.php';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?PHP include_once 'plantillas/documento-cierre.inc.php'; ?>
