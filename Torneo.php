<?php

class Torneo {
    private $partidos;
    private $importePremio;

    public function __construct($importePremio) {
        $this->partidos = [];
        $this->importePremio = $importePremio;
    }

    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido) {
        if ($objEquipo1->getObjCategoria() !== $objEquipo2->getObjCategoria() ||
            $objEquipo1->getCantJugadores() !== $objEquipo2->getCantJugadores()) {
            return "Los equipos no tienen la misma categoría o igual cantidad de jugadores.";
        }
    
        if ($tipoPartido == 'Futbol') {
            
            
            $idpartido = count($this->partidos) + 1;
            $golesEquipo1 = rand(0, 20);
            $golesEquipo2 = rand(0, 20);
            $objEquipo1->getNombre();
            $objEquipo2->getNombre();
            $partido = new Futbol($idpartido, $fecha, $objEquipo1, $golesEquipo1, $objEquipo2, $golesEquipo2, $coefMenores, $coefJuveniles, $coefMayores);
        } elseif ($tipoPartido == 'Basquetbol') {

            $idPartido = count($this->partidos) + 1;
            $golesEquipo1 = rand(0, 1000);
            $golesEquipo2 = rand(0, 1000);
            $cantInfracciones = rand(0, 1000);

            $partido = new Basquetbol($idPartido, $fecha, $objEquipo1, $golesEquipo1, $objEquipo2, $golesEquipo2, $cantInfracciones);
        } else {
            return "Tipo de partido no válido.";
        }
    
        $this->partidos[] = $partido;
        return $partido;
    }
    

    public function darGanadores($deporte) {
        $ganadores = [];
        foreach ($this->partidos as $partido) {
            if (($deporte == 'Futbol' && $partido instanceof Futbol) ||
                ($deporte == 'Basquetbol' && $partido instanceof Basquetbol)) {
                $ganador = $partido->darEquipoGanador();
                if (is_array($ganador)) {
                    $ganadores = array_merge($ganadores, $ganador);
                } else {
                    $ganadores[] = $ganador;
                }
            }
        }
        return $ganadores;
    }

    public function calcularPremioPartido($partido) {
        $coefPartido = $partido->coeficientePartido();
        $premio = $coefPartido * $this->importePremio;
        return [
            'equipoGanador' => $partido->darEquipoGanador(),
            'premioPartido' => $premio
        ];
    }

    public function __toString() {
        $cadena = "Torneo con importe premio: " . $this->importePremio . "\n";
        $cadena .= "Cantidad de partidos: " . count($this->partidos) . "\n";
        foreach ($this->partidos as $partido) {
            $cadena .= $partido . "\n";
        }
        return $cadena;
    }
}
?>