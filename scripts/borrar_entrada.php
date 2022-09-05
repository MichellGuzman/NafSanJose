<?PHP

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioEntradas.inc.php';
include_once 'app/Redireccion.inc.php';

if (isset($_POST['borrar_entrada'])) {
    $id_entrada = $_POST['id_borrar'];

    Conexion::abrir_conexion();
    RepositorioEntradas::eliminar_comentarios_y_entradas(Conexion::get_conexion(), $id_entrada);

    Conexion::cerrar_conexion();
    Redireccion::redirigir(RUTA_GESTOR_ENTRADAS);
} 