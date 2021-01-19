<?php

require_once('impiegato.php');

class ImpiegatoSalariato extends Impiegato {

    private $giorni_lavorati;
    private $compenso_giornaliero;

    public function __construct($init_impiegato){

        parent::__construct($init_impiegato);
        
        $this->giorni_lavorati = $init_impiegato['giorni_lavorati'];
        $this->compenso_giornaliero = $init_impiegato['compenso_giornaliero'];
    }

    public function calcola_compenso(){
        $this->compenso = $this->giorni_lavorati * $this->compenso_giornaliero;
    }

}


?>