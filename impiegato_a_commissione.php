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

        if(!is_numeric($this->commissione_progetto)){
            throw new Exception('Commissione progetto non è un numero!');
        } else {
            $this->compenso = $this->commissione_progetto;
        }
    }

}

?>