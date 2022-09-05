<?php

//titulo de la pagina
$titulo = "GESTOR";
//inicio del html
include_once 'plantillas/documento-declaracion.inc.php';
//Barra de navegacion estatica
include_once 'plantillas/navbar.inc.php';

include_once 'plantillas/panel_control_declaracion.inc.php';

switch ($gestor_actual) {
    case '':
        $total_entradas_activas = RepositorioEntradas::contar_entradas_activas_usuario(
                Conexion::get_conexion(), $_SESSION['id_usuario']);
        $total_entradas_inactivas = RepositorioEntradas::contar_entradas_inactivas_usuario(
                Conexion::get_conexion(), $_SESSION['id_usuario']);

        $total_comentarios_activos = RepositorioComentario::contar_comentarios_activos_usuario(
                Conexion::get_conexion(), $_SESSION['id_usuario']);
        $total_comentarios_inactivos = RepositorioComentario::contar_comentarios_inactivos_usuario(
                Conexion::get_conexion(), $_SESSION['id_usuario']);

        include_once 'plantillas/gestor_generico.inc.php';
        break;
    case 'entradas':
        $array_entradas = RepositorioEntradas::get_entradas_usuario_fecha_decendente(
                Conexion::get_conexion(), $_SESSION['id_usuario']);

        include_once 'plantillas/gestor_entradas.inc.php';
        break;
    case 'comentarios':
        include_once 'plantillas/gestor_comentarios.inc.php';
        break;
    case 'favoritos':
        include_once 'plantillas/gestor_favoritos.inc.php';
        break;
}

include_once 'plantillas/panel_control_cierre.inc.php';
?>

<?PHP include_once 'plantillas/documento-cierre.inc.php'; ?>