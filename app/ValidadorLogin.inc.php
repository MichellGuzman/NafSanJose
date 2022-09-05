<?PHP

include_once 'RepositorioUsuario.inc.php';
include_once 'mensajes.inc.php';

class ValidadorLogin {

    private $usuario;
    private $error;

    public function __construct($email, $clave, $conexion) {
        
        $this->error = "";

        if (!$this->variable_iniciada($email) || !$this->variable_iniciada($clave)) {

            $this->usuario = null;
            $this->error = MSJ_VL_CAMPOS_VACIOS;
        } else {
            $this->usuario = RepositoriUsuario::get_usuario_por_email($conexion, $email);
            if (is_null($this->usuario) || !password_verify($clave, $this->usuario->get_password())) {
                $this->error = MSJ_VL_CREDENCIALES_FALLO;
            }
        }
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_usuario() {
        return $this->usuario;
    }

    public function get_error() {
        return $this->error;
    }
    
    public function set_error() {
        if ($this->error !== "") {
            echo $this->error;
        }
    }

}

?>