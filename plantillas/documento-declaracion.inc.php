<?PHP
include_once 'inclucion-plantilla.php';

Conexion :: abrir_conexion();

$total_usuarios = RepositoriUsuario :: get_numero_usuarios(Conexion::get_conexion());

?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?PHP
        if (!isset($titulo) || empty($titulo)) {
            $titulo = "EL BLOG DE MAIK";
        }
        echo "<title>$titulo</title>";
        ?>

        <link href="<?PHP echo RUTA_CSS;?>bootstrap.min.css" rel="stylesheet">
        <link href="<?PHP echo RUTA_CSS;?>fontawesome.min.css" rel="stylesheet">
        <link href="<?PHP echo RUTA_CSS;?>estilos.css" rel="stylesheet">

    </head>
    <body>