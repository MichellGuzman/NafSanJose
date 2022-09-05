<?PHP

define("AVISO_INICIO", "<br><div class='alert alert-danger' role='alert'>");
define("AVISO_CIERRE", "</div>");

/* VALIDADOR REGISTRO - VR */
define("MSJ_VR_NOMBRE_VACIO",
        AVISO_INICIO .
        'Ingrese un nombre de usuario'
        . AVISO_CIERRE);

define("MSJ_VR_NOMBRE_EXCEDE_MINIMO",
        AVISO_INICIO .
        'El nombre de usuario deve tener mas de 6 caracteres'
        . AVISO_CIERRE);

define("MSJ_VR_NOMBRE_EXCEDE_MAXIMO",
        AVISO_INICIO .
        'El nombre de usuario deve tener menos de 24 caracteres'
        . AVISO_CIERRE);

define("MSJ_VR_NOMBRE_YA_EXISTE",
        AVISO_INICIO .
        'El nombre de usuario ingresado ya se encuentra en uso, intenta con otro nombre'
        . AVISO_CIERRE);

define("MSJ_VR_EMAIL_VACIO",
        AVISO_INICIO .
        'Ingrese un correo electronico'
        . AVISO_CIERRE);

define("MSJ_VR_EMAIL_YA_EXISTE",
        AVISO_INICIO .
        'El email ingresado ya se encuentra registrado en nustro sistema, prueva otro o <a href="#">recupere su clave</a>'
        . AVISO_CIERRE);

define("MSJ_VR_CLAVE_VACIA",
        AVISO_INICIO .
        'Ingrese una clave (campo ovligatorio)'
        . AVISO_CIERRE);

define("MSJ_VR_CLAVE_EXCEDE_MINIMO",
        AVISO_INICIO .
        'Ingrese una clave valida (mas de 6 caracteres)'
        . AVISO_CIERRE);

define("MSJ_VR_CLAVE_EXCEDE_MAXIMO",
        AVISO_INICIO .
        'Ingrese una clave valida (menos de 255 caracteres)'
        . AVISO_CIERRE);

define("MSJ_VR_CLAVE2_VACIA",
        AVISO_INICIO .
        'Por favor valide su clave en este campo'
        . AVISO_CIERRE);

define("MSJ_VR_CLAVE2_NO_COINCIDE",
        AVISO_INICIO .
        'Las claves no coinciden'
        . AVISO_CIERRE);

/* VALIDADOL LOGIN - VL */
define("MSJ_VL_CAMPOS_VACIOS",
        AVISO_INICIO .
        'Ingresa tu email y clave para iniciar sesión'
        . AVISO_CIERRE);

define("MSJ_VL_CREDENCIALES_FALLO",
        AVISO_INICIO .
        'Credenciales no validas, intenta de nuevo'
        . AVISO_CIERRE);

/* VALIDADOR ENTRADA - VE */
define("MSJ_VE_TITULO_VACIO",
        AVISO_INICIO .
        'Ingrese un titulo para su entrada'
        . AVISO_CIERRE);

define("MSJ_VE_TITULO_EXEDE_MINIMO",
        AVISO_INICIO .
        'El titulo de la entrada deve tener mas de 6 caracteres'
        . AVISO_CIERRE);

define("MSJ_VE_TITULO_EXEDE_MAXIMO",
        AVISO_INICIO .
        'El titulo de la entrada deve tener menos de 255 caracteres'
        . AVISO_CIERRE);

define("MSJ_VE_TITULO_EXISTE",
        AVISO_INICIO .
        'El nombre de la entrada ya se encuentra en uso, intenta con otro nombre'
        . AVISO_CIERRE);

define("MSJ_VE_URL_VACIO",
        AVISO_INICIO .
        'Ingrese una ruta de acceso unico para su entrada'
        . AVISO_CIERRE);

define("MSJ_VE_URL_ESPACIOS_VLANCOS",
        AVISO_INICIO .
        'La ruta unica contiene espacios en vlanco ( ), para separar las palabras se recomienda utilizar gion bajo (_) o similares'
        . AVISO_CIERRE);

define("MSJ_VE_URL_EXEDE_MINIMO",
        AVISO_INICIO .
        'La ruta de acceso unico no puede ser vacia'
        . AVISO_CIERRE);

define("MSJ_VE_URL_EXEDE_MAXIMO",
        AVISO_INICIO .
        'La ruta de acceso unico de su entrada deve tener menos de 255 caracteres'
        . AVISO_CIERRE);

define("MSJ_VE_URL_EXISTE",
        AVISO_INICIO .
        'La ruta de acceso unico ya se encuentra en uso, intenta con otra ruta de acceso unico'
        . AVISO_CIERRE);

define("MSJ_VE_TEXTO_VACIO",
        AVISO_INICIO .
        'Su entrada no puede ser vacia'
        . AVISO_CIERRE);

define("MSJ_VE_TEXTO_EXEDE_MINIMO",
        AVISO_INICIO .
        'Su entrada no puede tener menos de 10 caracteres'
        . AVISO_CIERRE);
