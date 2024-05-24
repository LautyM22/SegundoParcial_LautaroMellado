<?php

include_once("Partido.php");

class Futbol extends Partido {
    private $coefMenores = 0.13;
    private $coefJuveniles = 0.19;
    private $coefMayores = 0.27;

    public function coeficientePartido() {
        $coef = parent::coeficientePartido();
        $categoria = $this->getObjEquipo1()->getObjCategoria()->getDescripcion();
        switch ($categoria) {
            case 'Menores':
                $coef *= $this->coefMenores;
                break;
            case 'Juveniles':
                $coef *= $this->coefJuveniles;
                break;
            case 'Mayores':
                $coef *= $this->coefMayores;
                break;
        }
        return $coef;
    }
}

?>
