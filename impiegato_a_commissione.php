<?php

require_once('impiegato.php');
require_once('progetto.php');


class ImpiegatoSuCommissione extends Impiegato {

    use Progetto;

    public function __construct($init_impiegato){

        parent::__construct($init_impiegato);

        $this->nome_progetto = $init_impiegato['progetto'];
        $this->commissione_progetto = $init_impiegato['compenso'];
    }

    public function calcola_compenso(){
        $this->compenso = $this->commissione_progetto;
    }

}

?>