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
        if(!is_numeric($this->giorni_lavorati)){
            throw new Exception('Giorni lavorati non è un numero!');
        } else {
            $this->compenso = $this->giorni_lavorati * $this->compenso_giornaliero;
        }
    }

}


?>