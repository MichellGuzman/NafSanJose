<?php
//base de datos
define('NOMBRE_SERVIDOR','localhost');
define('NOMBRE_USUARIO','root');
define('PASSWORD','');
define('NOMBRE_BD','blog');

//rutas web
define("SERVIDOR",                  "http://localhost/blog");
define("RUTA_REGISTRO",             SERVIDOR."/registro");
define("RUTA_REGISTRO_CORRECTO",    SERVIDOR."/registro-correcto");
define("RUTA_LOGIN",                SERVIDOR."/login");
define("RUTA_LOGOUT",               SERVIDOR."/logout");
define("RUTA_ENTRADA",              SERVIDOR."/entrada");
define("RUTA_GESTOR",               SERVIDOR."/gestor");
define("RUTA_GESTOR_ENTRADAS",      RUTA_GESTOR."/entradas");
define("RUTA_GESTOR_COMENTARIOS",   RUTA_GESTOR."/comentarios");
define("RUTA_GESTOR_FAVORITOS",     RUTA_GESTOR."/favoritos");
define("RUTA_NUEVA_ENTRADA",        SERVIDOR."/nueva_entrada");
define("RUTA_BORRAR_ENTRADA",        SERVIDOR."/borrar_entrada");
define("RUTA_PUBLICAR_ENTRADA",        SERVIDOR."/publicar_entrada");
define("RUTA_PRIBATIZAR_ENTRADA",        SERVIDOR."/privatizar_entrada");

//recursos
define("RUTA_CSS", SERVIDOR."/css/");
define("RUTA_JS", SERVIDOR."/js/");