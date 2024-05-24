<?php

class Partido {
    private $idpartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2) {
        $this->idpartido = $idpartido;
        $this->fecha = $fecha;
        $this->objEquipo1 = $objEquipo1;
        $this->cantGolesE1 = $cantGolesE1;
        $this->objEquipo2 = $objEquipo2;
        $this->cantGolesE2 = $cantGolesE2;
        $this->coefBase = 0.5;
    }

    public function getIdpartido() {
        return $this->idpartido;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getObjEquipo1() {
        return $this->objEquipo1;
    }

    public function getCantGolesE1() {
        return $this->cantGolesE1;
    }

    public function getObjEquipo2() {
        return $this->objEquipo2;
    }

    public function getCantGolesE2() {
        return $this->cantGolesE2;
    }

    public function getCoefBase() {
        return $this->coefBase;
    }

    public function darEquipoGanador() {
        if ($this->cantGolesE1 > $this->cantGolesE2) {
            return $this->objEquipo1;
        } elseif ($this->cantGolesE2 > $this->cantGolesE1) {
            return $this->objEquipo2;
        } else {
            return [$this->objEquipo1, $this->objEquipo2];
        }
    }

    public function coeficientePartido() {
        return $this->coefBase * $this->cantGolesE1 * $this->objEquipo1->getCantJugadores();
    }

    public function __toString() {
        $cadena = "Idpartido: " . $this->getIdpartido() . "\n";
        $cadena .= "Fecha: " . $this->getFecha() . "\n";
        $cadena .= "Equipo 1: " . $this->getObjEquipo1() . "\n";
        $cadena .= "Cantidad Goles E1: " . $this->getCantGolesE1() . "\n";
        $cadena .= "Equipo 2: " . $this->getObjEquipo2() . "\n";
        $cadena .= "Cantidad Goles E2: " . $this->getCantGolesE2() . "\n";
        return $cadena;
    }
}
?>

