<?PHP

class Comentario {

    private $id;
    private $autor_id;
    private $entrada_id;
    private $titulo;
    private $texto;
    private $fecha;
    private $activa;

    public function __construct($id, $autor_id, $entrada_id, $titulo, $texto, $fecha, $activa) {

        $this->id = $id;
        $this->autor_id = $autor_id;
        $this->entrada_id = $entrada_id;
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->fecha = $fecha;
        $this->activa = $activa;
    }

    public function get_id() {
        return $this->id;
    }

    public function get_autor_id() {
        return $this->autor_id;
    }

    public function get_entrada_id() {
        return $this->entrada_id;
    }

    public function get_titulo() {
        return $this->titulo;
    }

    public function get_texto() {
        return $this->texto;
    }

    public function get_fecha() {
        return $this->fecha;
    }

    public function is_activa() {
        return $this->activa;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_autor_id($autor_id) {
        $this->autor_id = $autor_id;
    }

    public function set_entrada_id($entrada_id) {
        $this->entrada_id = $entrada_id;
    }

    public function set_titulo($titulo) {
        $this->titulo = $titulo;
    }

    public function set_texto($texto) {
        $this->texto = $texto;
    }

    public function set_fecha($fecha) {
        $this->fecha = $fecha;
    }

    public function set_activa($activa) {
        $this->activa = $activa;
    }

}
