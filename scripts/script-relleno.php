<?PHP

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntradas.inc.php';
include_once 'app/RepositorioComentario.inc.php';

Conexion::abrir_conexion();

for ($usuarios = 0; $usuarios < 100; $usuarios++) {
    $nombre = sa(10);
    $email = sa(5) . '@' . 'correo.com';
    $password = password_hash('123456', PASSWORD_DEFAULT);

    $usuario = new Usuario('', $nombre, $email, $password, '', '');
    RepositoriUsuario::insertar_usuario(Conexion::get_conexion(), $usuario);
}

for ($entradas = 0; $entradas < 100; $entradas++) {
    $autor = rand(1, 100);
    $titulo = sa(10);
    $url = $titulo;
    $texto = lorem();
    $activa = rand(0,1);

    $entrada = new Entrada('', $autor, $url, $titulo, $texto, '', $activa);
    RepositorioEntradas::insertar_entrada(Conexion::get_conexion(), $entrada);
}

for ($comentarios = 0; $comentarios < 100; $comentarios++) {
    $autor = rand(1, 100);
    $entrada = rand (1,100);
    $titulo = sa(10);
    $texto = lorem();

    $comentario = new Comentario('', $autor, $entrada, $titulo, $texto, '', '');
    RepositorioComentario::insertar_comentario(Conexion::get_conexion(), $comentario);
}

function sa($longitud) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';

    for ($i = 0; $i < $longitud; $i++) {
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }

    return $string_aleatorio;
}

function lorem() {
    $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fringilla ultricies vehicula. Vestibulum non blandit nibh. Suspendisse ante libero, egestas fringilla sapien nec, finibus aliquet massa. Aliquam mollis turpis ut arcu faucibus ullamcorper. Pellentesque ac rhoncus metus. Sed tincidunt lorem sed lectus ultricies tempus. Ut hendrerit purus eget turpis dignissim tincidunt. Sed condimentum, augue non mollis interdum, velit felis hendrerit ex, nec pharetra tellus lectus quis odio. Duis molestie lacus sed lorem volutpat, id placerat dui congue. Aliquam quis arcu at orci tempor blandit nec et eros.

Phasellus pulvinar, mi facilisis eleifend egestas, ligula turpis euismod purus, id pellentesque neque dolor efficitur ante. Proin sagittis elit eu efficitur imperdiet. Proin bibendum eros ut erat condimentum iaculis. Fusce eu dui a velit venenatis tincidunt quis ut ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce finibus porta quam placerat tincidunt. Quisque fermentum non augue at posuere. Vestibulum luctus dapibus nulla vel molestie. Vivamus et imperdiet augue, eu vehicula enim. Suspendisse potenti. Cras eu felis at urna eleifend condimentum vitae ut lectus. Etiam sed luctus ex.

Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam id mattis felis, a vestibulum massa. Nunc vehicula eros ac luctus lobortis. Etiam luctus arcu enim, nec lacinia ex ullamcorper ut. Phasellus sit amet ipsum sollicitudin, interdum ipsum non, congue sapien. Nullam placerat facilisis ipsum vel cursus. Vivamus feugiat consequat nibh, quis convallis tellus. Aenean et arcu at risus tempor pharetra. Pellentesque molestie, arcu non bibendum placerat, ligula purus convallis nisl, at ornare ligula lorem blandit elit. Aliquam eros dui, dapibus quis fringilla in, dignissim iaculis metus. Proin vel turpis nec quam tincidunt aliquet. Integer ut dapibus ipsum, ut auctor mi. Fusce id tempus diam. Quisque vitae leo facilisis, varius augue vel, lacinia leo. Sed ac augue accumsan, rutrum lectus id, tempor neque. Nullam a maximus velit.

Donec ante sapien, eleifend ac justo eu, consectetur hendrerit diam. Integer tempus id nibh dictum tempus. In molestie non lacus vitae consequat. Phasellus ac tristique magna. Fusce suscipit vehicula nibh in vehicula. Aliquam non orci non elit bibendum congue vel eget mauris. Phasellus hendrerit erat vitae dui aliquet, eget vestibulum tellus sodales. Sed in condimentum nisi. Etiam iaculis malesuada sapien sit amet egestas. Nulla ac est a tellus semper pulvinar. Praesent quis magna tristique, imperdiet ex varius, accumsan diam. Phasellus luctus lacus id ex sagittis, et imperdiet velit posuere. Fusce in lacus in enim bibendum sagittis eget quis elit.

Duis volutpat arcu ipsum. In hac habitasse platea dictumst. In hac habitasse platea dictumst. Phasellus risus dolor, auctor at nulla eu, feugiat egestas felis. Ut in sollicitudin quam. Proin varius risus at odio viverra pretium. Proin aliquam nisl dui, ut viverra augue porttitor ut. Nullam id libero aliquam, rutrum metus nec, faucibus felis. Morbi sed lectus vitae ligula elementum vulputate vel eget dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Interdum et malesuada fames ac ante ipsum primis in faucibus. In in augue sagittis, dapibus urna non, luctus urna.';

    return $lorem;
}
