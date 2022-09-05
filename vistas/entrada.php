<?PHP
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntradas.inc.php';
include_once 'app/RepositorioComentario.inc.php';

$titulo = $entrada->get_titulo();

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container contenedor-articulo">
    <div class="row">
        <div class="col-md-12">
            <h1>
                <?PHP echo $entrada->get_titulo(); ?>
            </h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <p>
                Por:
                <a href="#">
                    <span class="glyphicon glyphicon-education" aria-hidden="true"></span>
                    <?PHP echo $autor->get_nombre(); ?>
                </a>
                El
                <?PHP echo $entrada->get_fecha(); ?>
            </p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <article class="text-justify">
                <?PHP echo nl2br($entrada->get_texto()); ?>
            </article>
        </div>
    </div>
    <?PHP include_once 'plantillas/entradas_random.inc.php'; ?>
    <br>
    <?PHP 
    if (count($comentarios) > 0){
        include_once 'plantillas/comentarios_entrada.inc.php';
    }else{
        echo '<p>No se encontraron comentarios</p>';
    }
    ?>
</div>

<?PHP include_once 'plantillas/documento-cierre.inc.php'; ?>