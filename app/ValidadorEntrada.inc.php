<?PHP

include_once 'RepositorioEntradas.inc.php';
include_once 'mensajes.inc.php';

class ValidadorEntrada {

    private $titulo;
    private $url;
    private $texto;
    private $error_titulo;
    private $error_url;
    private $error_texto;

    public function __construct($conexion, $titulo, $url, $texto) {

        $this->titulo = '';
        $this->url = '';
        $this->texto = '';

        $this->error_titulo = $this->validar_titulo($conexion, $titulo);
        $this->error_url = $this->validar_url($conexion, $url);
        $this->error_texto = $this->validar_texto($texto);
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    private function validar_titulo($conexion, $titulo) {
        if (!$this->variable_iniciada($titulo)) {
            return MSJ_VE_TITULO_VACIO;
        } else {
            $this->titulo = $titulo;
        }
        if (strlen($titulo) < 0) {
            return MSJ_VE_TITULO_EXEDE_MINIMO;
        }
        if (strlen($titulo) > 255) {
            return MSJ_VE_TITULO_EXEDE_MAXIMO;
        }

        if (RepositorioEntradas :: titulo_existe($conexion, $titulo)) {
            return MSJ_VE_TITULO_EXISTE;
        }

        return '';
    }

    private function validar_url($conexion, $url) {
        if (!$this->variable_iniciada($url)) {
            return MSJ_VE_URL_VACIO;
        } else {
            $this->url = $url;
        }

        $url_tratada = str_replace(' ', '', $url);
        $url_tratada = preg_replace('/\s+/', '', $url_tratada);

        if (strlen($url) != strlen($url_tratada)) {
            return MSJ_VE_URL_ESPACIOS_VLANCOS;
        }

        if (strlen($url) < 0) {

            return MSJ_VE_URL_EXEDE_MINIMO;
        }
        if (strlen($url) > 255) {

            return MSJ_VE_URL_EXEDE_MAXIMO;
        }

        if (RepositorioEntradas :: url_existe($conexion, $url)) {

            return MSJ_VE_URL_EXISTE;
        }
        
        return '';
        
    }

    private function validar_texto($texto) {
        if (!$this->variable_iniciada($texto)) {
            return MSJ_VE_TEXTO_VACIO;
        } else {
            $this->texto = $texto;
        }
        if (strlen($texto) < 10) {
            return MSJ_VE_TEXTO_EXEDE_MINIMO;
        }

        return '';
    }

    public function get_Titulo() {
        
        return $this->titulo;
    }

    public function get_Url() {
        return $this->url;
    }

    public function get_Texto() {
        return $this->texto;
    }

    public function get_Error_titulo() {
        return $this->error_titulo;
    }

    public function get_Error_url() {
        return $this->error_url;
    }

    public function get_Error_texto() {
        return $this->error_texto;
    }

    public function set_Titulo() {
        if ($this->titulo !== '') {
            echo 'value="' . $this->titulo . '"';
        }
    }

    public function set_Url() {
        if ($this->url !== '') {
            echo 'value="' . $this->url . '"';
        }
    }

    public function set_Texto() {
        if ($this->texto !== '' && strlen(trim($this->texto)) > 0) {
            echo $this->texto;
        }
    }

    public function set_Error_titulo($error_titulo) {
        if ($this->error_titulo != '') {
            echo 'value="' . $this->error_titulo = $error_titulo . '"';
        }
    }

    public function set_Error_url($error_url) {
        if ($this->error_url != '') {
            echo 'value="' . $this->error_url = $error_url . '"';
        }
    }

    public function set_Error_texto($error_texto) {
        if ($this->error_texto != '') {
            echo 'value="' . $this->error_texto = $error_texto . '"';
        }
    }

    public function entrada_valida() {
        if ($this->error_titulo === "" &&
                $this->error_url === "" &&
                $this->error_texto === "") {
            return true;
        } else {
            return false;
        }
    }

}
