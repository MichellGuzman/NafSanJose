<?PHP

include_once 'plantillas/inclucion-plantilla.php';


$titulo = 'Registro Exitoso';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-ok-circle"></span> Registro Exitoso
                </div>
                <div class="panel-body text-center">
                    <p><b><?PHP echo $nombre; ?></b> gracias por registrarte </p>
                    <br>
                    <p><a href="<?PHP echo RUTA_LOGIN ?>">Inicia sesión</a> y empieza a compartir en nuestra comunidad</p>
                </div>
            </div>
        </div>
    </div>
</div>
