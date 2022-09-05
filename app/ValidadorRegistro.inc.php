<?PHP

include_once 'RepositorioUsuario.inc.php';
include_once 'mensajes.inc.php';

class ValidadorRegistro {

    private $nombre;
    private $email;
    private $clave;
    private $error_nombre;
    private $error_email;
    private $error_clave1;
    private $error_clave2;

    public function __construct($nombre, $email, $clave1, $clave2, $conexion) {

        $this->nombre = "";
        $this->email = "";
        $this->clave = "";

        $this->error_nombre = $this->validar_nombre($conexion, $nombre);
        $this->error_email = $this->validar_email($conexion, $email);
        $this->error_clave1 = $this->validar_clave1($clave1);
        $this->error_clave2 = $this->validar_clave2($clave1, $clave2);

        if ($this->error_clave1 === "" && $this->error_clave2 === "") {
            $this->clave = $clave2;
        }
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    private function validar_nombre($conexion, $nombre) {
        if (!$this->variable_iniciada($nombre)) {

            return MSJ_VR_NOMBRE_VACIO;
        } else {
            $this->nombre = $nombre;
        }
        if (strlen($nombre) < 6) {
            return MSJ_VR_NOMBRE_EXCEDE_MINIMO;
        }
        if (strlen($nombre) > 24) {
            return MSJ_VR_NOMBRE_EXCEDE_MAXIMO;
        }

        if (RepositoriUsuario :: nombre_existe($conexion, $nombre)) {
            return MSJ_VR_NOMBRE_YA_EXISTE;
        }

        return "";
    }

    private function validar_email($conexion, $email) {
        if (!$this->variable_iniciada($email)) {
            return MSJ_VR_EMAIL_VACIO;
        } else {
            $this->email = $email;
        }

        if (RepositoriUsuario :: email_existe($conexion, $email)) {
            return MSJ_VR_EMAIL_YA_EXISTE;
        }
        return "";
    }

    private function validar_clave1($clave1) {
        if (!$this->variable_iniciada($clave1)) {
            return MSJ_VR_CLAVE_VACIA;
        }
        if (strlen($clave1) < 6) {
            return MSJ_VR_CLAVE_EXCEDE_MINIMO;
        }
        if (strlen($clave1) > 255) {
            return MSJ_VR_CLAVE_EXCEDE_MAXIMO;
        }
        return "";
    }

    private function validar_clave2($clave1, $clave2) {
        if (!$this->variable_iniciada($clave1)) {
            return MSJ_VR_CLAVE_VACIA;
        }
        if (!$this->variable_iniciada($clave2)) {
            return MSJ_VR_CLAVE2_VACIA;
        }
        if ($clave1 != $clave2) {
            return MSJ_VR_CLAVE2_NO_COINCIDE;
        }
        return "";
    }

    public function get_nombre() {
        return $this->nombre;
    }

    public function get_email() {
        return $this->email;
    }

    public function get_password() {
        return $this->clave;
    }

    public function get_error_nombre() {
        return $this->error_nombre;
    }

    public function get_error_email() {
        return $this->error_email;
    }

    public function get_error_clave1() {
        return $this->error_clave1;
    }

    public function get_error_clave2() {
        return $this->error_clave2;
    }

    public function set_nombre() {
        if ($this->nombre !== "") {
            echo 'value="' . $this->nombre . '"';
        }
    }

    public function set_email() {
        if ($this->email !== "") {
            echo 'value="' . $this->email . '"';
        }
    }

    public function mostrar_error_nombre() {
        if ($this->error_nombre !== "") {
            echo $this->error_nombre;
        }
    }

    public function mostrar_error_email() {
        if ($this->error_email !== "") {
            echo $this->error_email;
        }
    }

    public function mostrar_error_clave1() {
        if ($this->error_clave1 !== "") {
            echo $this->error_clave1;
        }
    }

    public function mostrar_error_clave2() {
        if ($this->error_clave2 !== "") {
            echo $this->error_clave2;
        }
    }

    public function registro_valido() {
        if ($this->error_nombre === "" &&
                $this->error_email === "" &&
                $this->error_clave1 === "" &&
                $this->error_clave2 === "") {
            return true;
        } else {
            return false;
        }
    }

}
