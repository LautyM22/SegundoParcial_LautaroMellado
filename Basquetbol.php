<?php

include_once("Partido.php");

class Basquetbol extends Partido {
    private $cantInfracciones;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $cantInfracciones) {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->cantInfracciones = $cantInfracciones;
    }

    public function coeficientePartido() {
        $coef = parent::coeficientePartido();
        $coefPenalizacion = 0.75;
        return $coef - ($coefPenalizacion * $this->cantInfracciones);
    }

    public function __toString() {
        return parent::__toString() . "Infracciones: " . $this->cantInfracciones . "\n";
    }
}

?>