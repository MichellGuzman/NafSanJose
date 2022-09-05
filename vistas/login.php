<?PHP
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';

if (ControlSesion::sesion_iniciada()){
    Redireccion::redirigir(SERVIDOR);
}

if (isset($_POST['login'])) {
    Conexion::abrir_conexion();

    $validador = new ValidadorLogin($_POST['email'], $_POST['clave'], Conexion::get_conexion());

    if ($validador->get_error() === '' && !is_null($validador->get_usuario())) {
        //inicio de secion
        ControlSesion::iniciar_sesion(
                $validador -> get_usuario() -> get_id(),
                $validador -> get_usuario() -> get_nombre()
        );
        //redirigir a index
        Redireccion::redirigir(SERVIDOR);
//        echo 'inicio de secion ok';
//        
//    }else{
//        echo 'no se pudo iniciar secion';
    }
    Conexion::cerrar_conexion();
}

$titulo = 'Login';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Iniciar sesión</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?PHP echo RUTA_LOGIN ?>">
                        <h2>Ingresa tus credenciales</h2>
                        <br>
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="usuario@email.email" 
                        <?PHP
                        if (isset($_POST['login']) && isset($_POST['email']) && !empty($_POST['email'])) {
                            echo 'value="' . $_POST['email'] . '"';
                        }
                        ?>
                               required autofocus>
                        <br>
                        <label for="clave" class="sr-only">Clave</label>
                        <input type="password" name="clave" id="clave" class="form-control" placeholder="clave" required>
                        <br>
                        <?PHP
                        if (isset($_POST['login'])) {
                            $validador->set_error();
                        }
                        ?>
                        <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">
                            Iniciar sesión
                        </button>
                        <br>
                        <br>
                        <div class="text-center">
                            <a href="#">¿No recuerdas tu clave?</a>
                        </div>
                        <div class="text-center">
                            <a href="<?PHP echo RUTA_REGISTRO ?>">¿No tienes una cuenta?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?PHP include_once 'plantillas/documento-cierre.inc.php'; ?>