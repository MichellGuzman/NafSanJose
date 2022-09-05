<?PHP

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntradas.inc.php';
include_once 'app/RepositorioComentario.inc.php';

$componentes_url = parse_url($_SERVER["REQUEST_URI"]);

$ruta = $componentes_url['path'];

$partes_ruta = explode("/", $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = 'vistas/404.php';

if ($partes_ruta[0] == 'blog') {
    if (count($partes_ruta) == 1) {
        $ruta_elegida = 'vistas/home.php';
    } else if (count($partes_ruta) == 2) {
        switch ($partes_ruta[1]) {
            case 'login':
                $ruta_elegida = 'vistas/login.php';
                break;

            case 'logout':
                $ruta_elegida = 'vistas/logout.php';
                break;

            case 'gestor':
                $ruta_elegida = 'vistas/gestor.php';
                $gestor_actual = '';
                break;

            case 'registro':
                $ruta_elegida = 'vistas/registro.php';
                break;
            
            case 'nueva_entrada':
                $ruta_elegida = 'vistas/nueva_entrada.php';
                break;
            
            case 'borrar_entrada':
                $ruta_elegida = 'scripts/borrar_entrada.php';
                break;
            
            case 'publicar_entrada':
                $ruta_elegida = 'scripts/publicar_entrada.php';
                break;
            
            case 'privatizar_entrada':
                $ruta_elegida = 'scripts/privatizar_entrada.php';
                break;

            case 'script-relleno':
                $ruta_elegida = 'scripts/script-relleno.php';
                break;
        }
    } else if (count($partes_ruta) == 3) {
        if ($partes_ruta[1] == 'registro-correcto') {
            $nombre = $partes_ruta[2];
            $ruta_elegida = 'vistas/registro-correcto.php';
        }

        if ($partes_ruta[1] == 'entrada') {
            $url = $partes_ruta[2];

            Conexion::abrir_conexion();

            $entrada = RepositorioEntradas::get_entrada_por_url(Conexion::get_conexion(), $url);

            if ($entrada != null) {
                $autor = RepositoriUsuario::get_usuario_por_id(Conexion::get_conexion(), $entrada->get_autor_id());
                $comentarios = RepositorioComentario::get_comentarios(Conexion::get_conexion(), $entrada->get_id());
                $entradas_random = RepositorioEntradas::get_entradas_random(Conexion::get_conexion(), 3);

                $ruta_elegida = 'vistas/entrada.php';
            }
        }
        if ($partes_ruta[1] == 'gestor') {
            switch ($partes_ruta[2]) {
                case 'entradas':
                    $gestor_actual = 'entradas';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
                case 'comentarios':
                    $gestor_actual = 'comentarios';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
                case 'favoritos':
                    $gestor_actual = 'favoritos';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
            }
        }
    }
}

include_once $ruta_elegida;
